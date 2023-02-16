<?php

namespace App\PaymentGateways;

use App\Models\Payment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use Exception;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class PaypalGateway implements PaymentGateways
{
    protected array $options;

    protected $client;

    public function __construct($options)
    {
        $this->options = $options;
    }

    protected function client()
    {
        if (!$this->client()) {

            $this->client = new PayPalHttpClient(
                new SandboxEnvironment(
                    $this->options['client_id'],
                    $this->options['client_secret']
                )
            );
        }

        return $this->client;
    }

    //createPayment
    public function create($order):string
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

            foreach ($response->result->links as $link) {

                if ($link->rel == 'approve') {
                    return $link->href;
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

            $payment = new Payment();
            
            return $payment;

        } catch (Exception $ex) {

            return $ex->getMessage();
        }
    }
}
