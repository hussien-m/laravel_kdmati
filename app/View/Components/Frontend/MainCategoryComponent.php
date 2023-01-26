<?php

namespace App\View\Components\Frontend;

use App\Models\Category;
use Illuminate\View\Component;

class MainCategoryComponent extends Component
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
        $data['categories']= Category::whereHas('parent')->latest()->get();
        return view('components.frontend.main-category-component',$data);
    }
}
