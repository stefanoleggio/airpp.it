<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreatePaymentController extends Controller
{
    private $_api_context;

    public function __construct(Request $request){
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function payWithpaypal(Request $request){

    }
}
