<?php
    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;
    use App\Mail\DonationSecEmail;
    use App\Mail\DonationEmail;
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

    class DonationsController extends Controller
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
                'amount' => 'required|integer|min:5',
                'via' => 'required',
                'cap' => 'required',
                'comune' => 'required',
                'privacy' => 'accepted',
                'cf' => ['required', new codicefiscale]
            ],
            [
                'name.required' => 'Devi inserire il nome',
                'surname.required' => 'Devi inserire il cognome',
                'email.required' => 'Devi inserire l\'email',
                'amount.required' => 'Devi inserire l\'importo',
                'email.email' => 'Devi inserire una email valida',
                'amount.integer' => 'L\'importo deve essere una cifra tonda',
                'via.required' => 'Devi inserire la tua via',
                'cap.required' => 'Devi inserire il cap',
                'comune.required' => 'Devi inserire il comune',
                'cf.required' => 'Devi inserire il codice fiscale',
                'privacy.accepted' => 'Devi accettare la privacy policy',
                'amount.min' => 'La donazione minima è di 5 Euro'
            ]);

            $payer = new Payer();
            $payer->setPaymentMethod('paypal');
            $amount = new Amount();
            $amount->setCurrency('EUR')
                ->setTotal($request->get('amount'));
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setDescription('Donazione');
            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(URL::to('donationsstatus'))
                ->setCancelUrl(URL::to('donationsstatus'));
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
                    return Redirect::to('/donazioni');
                } else {
                    \Session::put('error', 'Si è verificato un errore, ci scusiamo');
                    return Redirect::to('/donazioni');
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
                DB::table('donations')->insert(
                    [
                        'paymentID' => $payment->getId(),
                        'name' => $request->name, 
                        'surname' => $request->surname,
                        'email' => $request->email,
                        'amount' => $request->amount,
                        'cf' => $request->cf,
                        'cap' => $request->cap,
                        'comune' => $request->comune,
                        'via' => $request->via,
                        'success' => false,
                        'date' => Carbon::now(),
                    ]
                );
                return Redirect::away($redirect_url);
            }
            \Session::put('error', 'Si è verificato un errore, ci scusiamo');
            return Redirect::to('/donazioni');
        }

        public function getPaymentStatus()
        {
            $payment_id = Session::get('paypal_payment_id');
            Session::forget('paypal_payment_id');
            if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
                \Session::put('error', 'Donazione fallita, riprovare');
                return Redirect::to('/donazioni');
            }
            $payment = Payment::get($payment_id, $this->_api_context);
            $execution = new PaymentExecution();
            $execution->setPayerId(Input::get('PayerID'));
            $result = $payment->execute($execution, $this->_api_context);
            if ($result->getState() == 'approved') {
                DB::table('donations')
                    ->where('paymentID', $payment->getId())
                    ->update(['success' => true]);
                $data = DB::table('donations')->where('paymentID', $payment->getId())->get();
                /*
                    Invio email
                */
                Mail::to('segreteria@airpp.it')->send(new DonationSecEmail($data[0]));
                Mail::to($data[0]->email)->send(new DonationEmail($data[0]));
                \Session::put('success', 'Donazione effettuata con successo');
                return Redirect::to('/donazioni');
            }
            \Session::put('error', 'Donazione fallita, riprovare');
            return Redirect::to('/donazioni');
        }
    }