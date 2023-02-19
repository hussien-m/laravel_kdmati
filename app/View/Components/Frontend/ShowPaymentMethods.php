<?php

namespace App\View\Components\Frontend;

use App\Models\PaymentMethod;
use Illuminate\View\Component;

class ShowPaymentMethods extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $methods;

    public function __construct()
    {
        $this->methods = PaymentMethod::where('status','active')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.show-payment-methods');
    }
}
