<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TestCartWire extends Component
{
    public $cart;

    protected $listeners =[
        'mount' => 'mount',
    ];

    public function mount()
    {

        $this->cart = Cart::where('user_id',Auth::id())->with('service')->get();

    }

    public function render()
    {
        return view('livewire.frontend.test-cart-wire');
    }


}
