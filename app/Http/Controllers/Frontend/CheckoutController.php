<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\PaymentGateways\PaymentGatewayFactory;
use App\PaymentGateways\Paypal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|exists:payment_methods,slug',
        ]);

        $gateawy = PaymentGatewayFactory::create($request->input('payment_method'));

        $user    = Auth::user();

        $order = Order::create([

            'user_id'        => $user->id,
            'service_id'     => 2,
            'number'         => Str::uuid(),
            'payment_method' => $request->input('payment_method'),
            'status'         => 'pending',
            'payment_status' => 'pending',
            'total'          => 150,
        ]);

       return  $gateawy->create($order , $user);
    }

    public function callback(Request $request,$slug)
    {

        $gateawy = PaymentGatewayFactory::create($slug);
        return $gateawy->verify($request->token);

    }

    public function cancel()
    {
        toast('فشلت عملية الدفع','warning');
        return redirect()->route("index.page");
    }
}
