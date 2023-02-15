<?php

namespace App\View\Components\Frontend;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class TestCart extends Component
{
    public $cart;

    public $cart_count;

    public $sum_addons;

    public $quantity;

    public $service_price= 5;

    public $total;

    public $tax;

    public $final_total;

    public function __construct()
    {
        $this->cart = Cart::where('user_id',Auth::id())->with('service')->get();

        foreach($this->cart as $item) {

           $this->total += ($item->addons_price*$item->quantity)+($item->quantity*$item->service->price);

        }

        $this->tax = $this->total / 5;

        $this->final_total = $this->total +  $this->tax;
    }

    public function render()
    {
        return view('components.frontend.test-cart');
    }
}
