<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpesa;

class mpesa_controller extends Controller
{

   

    public function stk_simulation()
    {
        $mpesa= new \Safaricom\Mpesa\Mpesa();

        $BusinessShortCode = '174379';
        $LipaNaMpesaPasskey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $TransactionType = 'CustomerPayBillOnline';
        $Amount = '1';
        $PartyA = '254746853020';
        $PartyB = '174379';
        $PhoneNumber = '254746853020';
        $CallBackURL ='https://aflalasanisheba.com/'; 
        $AccountReference='AccountReference'; 
        $TransactionDesc ='TransactionDesc';
        $Remarks = 'Thank you for your payment.';
  
        $stkPushSimulation=$mpesa->STKPushSimulation($BusinessShortCode, $LipaNaMpesaPasskey, 
        $TransactionType, $Amount, $PartyA, $PartyB, $PhoneNumber, $CallBackURL, $AccountReference, $TransactionDesc, $Remarks);

        // dd($stkPushSimulation);

        sleep(10);

        $notification = array(
    		'message' => 'Thank you, your payment has been received.',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('dashboard')->with($notification);
    }
}
