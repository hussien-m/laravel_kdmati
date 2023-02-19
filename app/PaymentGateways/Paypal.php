<?php

namespace App\PaymentGateways;

use App\Models\Cart;
use App\Models\Payment;
use App\Models\PaymentMethod;
use Carbon\Carbon;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use Exception;
use Illuminate\Support\Facades\Auth;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PayPalHttp\HttpException;

class Paypal implements PaymentGateways
{
    protected $paymentMethod;

    protected $client;

    public function __construct()
    {
        $this->paymentMethod = PaymentMethod::where('slug','paypal')->first();
    }

    protected function client()
    {
        $this->client = new PayPalHttpClient(
                new SandboxEnvironment(
                    $this->paymentMethod->options['client_id'],
                    $this->paymentMethod->options['client_secret']
                )
            );
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

                "cancel_url" => route('payment.cancel','paypal'),

                "return_url" => route('payment.return','paypal')
            ]
        ];



        try {
            //89L980534R4914640
            $response = $this->client()->execute($request);
           // dd($response);
           // Session::put('payapl_order_id', $response->result->id);

            //Create Payment Row

            $payment = Payment::create([

                'payment_method_id'   => $this->paymentMethod->id,
                'paymentable_id'      => $order->id,
                'paymentable_type'    => $order->id,
                'payer_id'            => $user->id,
                'amount'              => $order->total,
                'currency_code'       => "USD",
                'type'                => 'payment',
                'status'              => 'pending',
                'transaction_id'      => $response->result->id,
                //'payment_response'    => $response->result->response,
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),

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

    public function verify($id)
    {

        $request = new OrdersCaptureRequest($id);

        $request->prefer('return=representation');


        try {
            $client = $this->client();

            $response = $client->execute($request);

            if($response->result->status == 'COMPLETED'){

                $payment = Payment::where('transaction_id',$id)
                                ->where('payment_method_id',$this->paymentMethod->id)
                                ->first();

                $payment->update([
                    'status' =>'completed',
                    //'payment_status' =>'paid',
                ]);

                Cart::where('user_id',Auth::id())->delete();
            }



            return $payment;

        } catch (Exception $ex) {

            return $ex->getMessage();
        }
    }



    public function formOptions():array
    {
        return [
            'client_id' => [
                'type'  => 'text',
                'label' => 'Clien ID',
                'placeholder' => 'Clien ID',
                'required' => true,
                'validation' => 'required|string|max:255',
            ],
            'client_secret' => [
                'type'  => 'text',
                'label' => 'Clien Secret',
                'placeholder' => 'Clien Secret',
                'required' => true,
                'validation' => 'required|string|max:255',
            ]
        ];
    }
}
