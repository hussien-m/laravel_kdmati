<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Notifications\Frontend\AddServiceToCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {

            $user = Auth::user();

            $cart = new Cart();

            $cart->user_id      = Auth::user()->id;

            $cart->service_id   = $request->service_id;

            $cart->quantity     = $request->quantity;

            $cart->total_price  = $request->total_price;



            $cart->save();

            if($cart){

                return response(['status' => true, 'message' => 'success']);

            }

            return response(['status' => true, 'message' => 'error555']);

    }
}
