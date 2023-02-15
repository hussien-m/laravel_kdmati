<?php

namespace App\View\Components\Frontend;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class ServiceComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {


       $data['categories_services'] = Category::with('services')
                                        ->whereHas('parent')
                                        ->latest()

                                        ->get();

        return view('components.frontend.service-component',$data);
    }
}
