<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartList extends Component
{
    public $carts;


    protected $listeners =[
        'updateCart' => 'updateCart',
    ];

    public function updateCart()
    {
        $this->carts = Cart::where('user_id',Auth::user()->id)->get();
    }

    public function mount()
    {

        $this->carts = Cart::where('user_id',Auth::user()->id)->get();
    }

    public function render()
    {
        return view('livewire.frontend.cart-list');
    }
}
