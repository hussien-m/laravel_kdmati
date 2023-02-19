<?php

namespace App\PaymentGateways;

use App\Models\Payment;
use App\Models\PaymentMethod;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use Exception;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Redirect;

class Strip implements PaymentGateways
{
    protected $paymentMethod;

    protected $client;

    public function __construct()
    {
        $this->paymentMethod = PaymentMethod::where('slug','strip')->first();
    }

    protected function client()
    {
        if (!$this->client()) {

            $this->client = new PayPalHttpClient(
                new SandboxEnvironment(
                    $this->paymentMethod->options['client_id'],
                    $this->paymentMethod->options['client_secret']
                )
            );
        }

        return $this->client;
    }

    //createPayment
    public function create($order,$user)
    {

        $request = new OrdersCreateRequest();

        $request->prefer('return=representation');

        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => "test_ref_id1",
                "amount" => [
                    "value" => $order->total,
                    "currency_code" => "USD"
                ]
            ]],
            "application_context" => [
                "cancel_url" => route('payment.cancel'),
                "return_url" => route('payment.return')
            ]
        ];

        try {

            $response = $this->client()->execute($request);

            //Create Payment Row
            $payment = Payment::create([

                'payment_method_id'   => $this->paymentMethod->id,
                'paymentable_id'      => $order->id,
                'paymentable_type'    => get_class($order),
                'payer_id'            => get_class($user),
                'amount'              => $order->aomunt,
                'currency_code'       => $order->currency_code,
                'type'                => 'payment',
                'status'              => 'pending',
                'transaction_id'      => $response->result->id,

            ]);

            foreach ($response->result->links as $link) {

                if ($link->rel == 'approve') {
                    return Redirect::away($link->href);  //$link->href;
                }
            }
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    //verifyPayment or Capture id for PaymentID ->transaction
    public function verify($id):Payment
    {
        $request = new OrdersCaptureRequest("APPROVED-ORDER-ID");

        $request->prefer('return=representation');

        try {

            $response = $this->client->execute($request);

            if($response->result->status == 'COMPLETED'){
                $payment = Payment::where('transaction_id',$id)
                                ->where('payment_method_id',$this->paymentMethod->id)
                                ->first();
            }

            return $payment;

        } catch (Exception $ex) {

            return $ex->getMessage();
        }
    }

    public function formOptions():array
    {
        return [];
    }
}
