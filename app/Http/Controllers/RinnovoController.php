<?php
    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\DB;
    
    use Carbon\Carbon;
    
    use App\Mail\RinnovoSecEmail;
    
    use App\Mail\RinnovoEmail;
    
    use Illuminate\Support\Facades\Mail;
    
    use Illuminate\Http\Request;
    
    use Illuminate\Support\Facades\Input;
    
    use PayPal\Api\Amount;
    
    use PayPal\Api\Details;
    
    use PayPal\Api\Item;
    
    use PayPal\Api\ItemList;
    
    use PayPal\Api\Payer;
    
    use PayPal\Api\Payment;
    
    use PayPal\Api\PaymentExecution;
    
    use PayPal\Api\RedirectUrls;
    
    use PayPal\Api\Transaction;
    
    use PayPal\Auth\OAuthTokenCredential;
    
    use PayPal\Rest\ApiContext;
    
    use Redirect;
    
    use Session;
    
    use URL;
    
    use App\Rules\codicefiscale;

    use App\Rules\Captcha;

    use App\Rules\checkArchive;

    use App\Rinnovo;

    use App\Banner;

    use App\Socio;
    
    use CodiceFiscaleController;

    class RinnovoController extends Controller
    {
        private $_api_context;
        /**
         * Create a new controller instance.
         *
         * @return void
         */

        public function __construct(Request $request)
        {
            $paypal_conf = \Config::get('paypal');
            $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
            );
            $this->_api_context->setConfig($paypal_conf['settings']);
        }
        
        public function payWithpaypal(Request $request)
        {
            $request->validate(
            [
                'email' => 'required|email',
                'amount' => 'required|integer|min:15',
                'cf' => ['required', new codicefiscale],
                'g-recaptcha-response' => new Captcha()
            ],
            [
                'email.required' => 'Devi inserire l\'email',
                'amount.required' => 'Devi inserire l\'importo',
                'email.email' => 'Devi inserire una email valida',
                'amount.integer' => 'L\'importo deve essere un numero intero',
                'cf.required' => 'Devi inserire il codice fiscale',
                'amount.min' => 'La quota di rinnovo minima è di 15 Euro'
            ]);

            $tmp = Socio::where('cf', '=', $request->cf)->first();

            if(is_null($tmp)) {
                \Session::put('error', 'Non risulti nei nostri archivi! Iscriviti oppure contattaci');
                return Redirect::to('/rinnovo');
            }

            $payer = new Payer();
            $payer->setPaymentMethod("paypal");
            $item1 = new Item();
            $item1->setName('Rinnovo')
                ->setCurrency('EUR')
                ->setQuantity(1)
                ->setPrice($request->amount);
    
            $itemList = new ItemList();
            $itemList->setItems(array($item1));
    
            $amount = new Amount();
            $amount->setCurrency("EUR")
                ->setTotal($request->amount);
                $transaction = new Transaction();
    
            $transaction->setAmount($amount)
                ->setItemList($itemList)
                ->setDescription("Rinnovo")
                ->setInvoiceNumber(uniqid());
    
            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(URL::to('rinnovostatus'))
                ->setCancelUrl(URL::to('rinnovostatus'));
        
            $presentation = new \PayPal\Api\Presentation();
            $presentation->setLogoImage("http://157.230.126.155/media/logo/logo_paypal.svg")
                ->setBrandName("airpp")
                ->setLocaleCode("IT")
                ->setReturnUrlLabel("Torna indietro")
                ->setNoteToSellerLabel("Grazie");

            $flowConfig = new \PayPal\Api\FlowConfig();
            $flowConfig->setLandingPageType("Billing");
            $flowConfig->setBankTxnPendingUrl("http://www.airpp.it/");
            $flowConfig->setUserAction("commit");
            $flowConfig->setReturnUriHttpMethod("GET");

            $inputFields = new \PayPal\Api\InputFields();
            $inputFields->setAllowNote(true)
                ->setNoShipping(1)
                ->setAddressOverride(0);

            $webProfile = new \PayPal\Api\WebProfile();
            $webProfile->setName("Airpp - Rinnovo" . uniqid())
                ->setFlowConfig($flowConfig)
                ->setPresentation($presentation)
                ->setInputFields($inputFields)
                ->setTemporary(true);

            $webProfileId = $webProfile->create($this->_api_context)->getId();

            $payment = new Payment();
            $payment->setIntent("sale")
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction))
                ->setExperienceProfileId($webProfileId);
    
            try {
                $payment->create($this->_api_context);
            } catch (\PayPal\Exception\PPConnectionException $ex) {
                if (\Config::get('app.debug')) {
                    \Session::put('error', 'Connessione scaduta');
                    return Redirect::to('/rinnovo');
                } else {
                    \Session::put('error', 'Si è verificato un errore, ci scusiamo');
                    return Redirect::to('/rinnovo');
                }
            }
            foreach ($payment->getLinks() as $link) {
                if ($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }
            }

            Session::put('paypal_payment_id', $payment->getId());
            
            if (isset($redirect_url)) {
                $data = new Rinnovo;
                $data->paymentID = $payment->getId();
                $data->email = $request->email;
                $data->amount = $request->amount;
                $data->cf = $request->cf;
                $data->date = Carbon::now();
                $data->success = false;
                $data->save();
                return Redirect::away($redirect_url);
            }
            \Session::put('error', 'Si è verificato un errore, ci scusiamo');
            return Redirect::to('/rinnovo');
        }

        public function getPaymentStatus()
        {
            $payment_id = Session::get('paypal_payment_id');
            Session::forget('paypal_payment_id');
            if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
                \Session::put('error', 'Rinnovo fallito, riprovare');
                return Redirect::to('/rinnovo');
            }
            $payment = Payment::get($payment_id, $this->_api_context);
            $execution = new PaymentExecution();
            $execution->setPayerId(Input::get('PayerID'));
            $result = $payment->execute($execution, $this->_api_context);
            if ($result->getState() == 'approved') {
                $data = Rinnovo::where('paymentID', $payment->getId())->first();
                $data->success = true;
                $data->save();
                Mail::to(env('MAIL_SEC'))->send(new RinnovoEmail($data));
                Mail::to($data->email)->send(new RinnovoEmail($data));
                $this->updateSocio($data);
                \Session::put('success', 'Rinnovo effettuato con successo');
                return Redirect::to('/rinnovo');
            }
            \Session::put('error', 'Rinnovo fallito, riprovare');
            return Redirect::to('/rinnovo');
        }

        public function updateSocio($data) {
            $socio = Socio::where('cf', $data->cf);
            $socio->data_iscrizione = $data->date;
            $socio->save();
        }
    }
