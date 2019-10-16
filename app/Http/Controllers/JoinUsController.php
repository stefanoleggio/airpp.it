<?php
    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;
    use App\Mail\IscrizioneSecEmail;
    use App\Mail\IscrizioneEmail;
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
    use CodiceFiscaleController;

    class JoinUsController extends Controller
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
                'name' => 'required',
                'surname' => 'required',
                'email' => 'required|email',
                'amount' => 'required|integer|min:15',
                'cap' => 'required|integer',
                'comune' => 'required',
                'via' => 'required',
                'cf' => ['required', new codicefiscale]
            ],
            [
                'name.required' => 'Devi inserire il nome',
                'surname.required' => 'Devi inserire il cognome',
                'email.required' => 'Devi inserire l\'email',
                'amount.required' => 'Devi inserire l\'importo',
                'email.email' => 'Devi inserire una email valida',
                'amount.integer' => 'L\'importo deve essere una cifra tonda',
                'cap.required' => 'Devi inserire il cap',
                'cap.integer' => 'Il cap non è valido',
                'comune.required' => 'Devi inserire il comune',
                'via.required' => 'Devi inserire la tua via',
                'cf.required' => 'Devi inserire il codice fiscale'
            ]);
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');
            $amount = new Amount();
            $amount->setCurrency('EUR')
                ->setTotal($request->get('amount'));
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setDescription('Iscrizione');
            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(URL::to('joinusstatus'))
                ->setCancelUrl(URL::to('joinusstatus'));
            $payment = new Payment();
            $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));
            try {
                $payment->create($this->_api_context);
            } catch (\PayPal\Exception\PPConnectionException $ex) {
                if (\Config::get('app.debug')) {
                    \Session::put('error', 'Connessione scaduta');
                    return Redirect::to('/associarsi');
                } else {
                    \Session::put('error', 'Si è verificato un errore, ci scusiamo');
                    return Redirect::to('/associarsi');
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
                DB::table('iscrizioni')->insert(
                    [
                        'paymentID' => $payment->getId(),
                        'name' => $request->name, 
                        'surname' => $request->surname,
                        'email' => $request->email,
                        'amount' => $request->amount,
                        'cf' => $request->cf,
                        'comune' => $request->comune,
                        'cap' => $request->cap,
                        'via' => $request->via,
                        'success' => false,
                        'date' => Carbon::now(),
                    ]
                );
                return Redirect::away($redirect_url);
            }
            \Session::put('error', 'Si è verificato un errore, ci scusiamo');
            return Redirect::to('/associarsi');
        }

        public function getPaymentStatus()
        {
            $payment_id = Session::get('paypal_payment_id');
            Session::forget('paypal_payment_id');
            if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
                \Session::put('error', 'Donazione fallita, riprovare');
                return Redirect::to('/associarsi');
            }
            $payment = Payment::get($payment_id, $this->_api_context);
            $execution = new PaymentExecution();
            $execution->setPayerId(Input::get('PayerID'));
            $result = $payment->execute($execution, $this->_api_context);
            if ($result->getState() == 'approved') {
                DB::table('iscrizioni')
                    ->where('paymentID', $payment->getId())
                    ->update(['success' => true]);
                $data = DB::table('iscrizioni')->where('paymentID', $payment->getId())->get();
                /*
                    Invio email
                */
                Mail::to(env('MAIL_SEC'))->send(new IscrizioneSecEmail($data[0]));
                //Mail::to($data->email)->send(new DonationEmail($data));
                \Session::put('success', 'Iscrizione effettuata con successo');
                return Redirect::to('/associarsi');
            }
            \Session::put('error', 'Donazione fallita, riprovare');
            return Redirect::to('/associarsi');
        }
    }
