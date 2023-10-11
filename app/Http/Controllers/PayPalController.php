<?php

namespace App\Http\Controllers;


use App\Models\ResponsePaypal;
use Illuminate\Http\Request;
use App\Http\Requests\PaypalRequest;
use Illuminate\Support\Facades\Config;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;


class PayPalController extends Controller
{

    private $apiContext;
    public function __construct()
    {
        $paypalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $paypalConfig['client_id'],
                $paypalConfig['secret']
            )
        );
        $this->apiContext->setConfig($paypalConfig['settings']);


    }

    public function payWhit()
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal('1.00');
        $amount->setCurrency('MXN');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription('PROBANDO LOS PAGOS CON PAYPAL');

        $url = url('/paypal/status');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($url)
            ->setCancelUrl($url);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            return $ex->getData();
        }
    }

    public function status(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect('/paypal')->with(compact('status'));
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        $result = $payment->execute($execution, $this->apiContext);


        $responsePaypal = json_decode($result);

        if ($responsePaypal->state == 'approved') {
            $rPay = new ResponsePaypal();
            $rPay->id_paypal = $responsePaypal->id;
            $rPay->status = $responsePaypal->state;
            $rPay->payer_id = $responsePaypal->payer->payer_info->payer_id;
            $rPay->name = $responsePaypal->payer->payer_info->first_name.' '.$responsePaypal->payer->payer_info->last_name;
            $rPay->amount = $responsePaypal->transactions[0]->amount->total;
            $rPay->save();
        } else {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        }
        dd($result);
    }

    public function index()
    {
        return view('paypal.pagopaypal');
    }


}
