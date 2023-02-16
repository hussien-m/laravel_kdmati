<?php

namespace App\View\Components\Frontend;

use App\Models\Category;
use Illuminate\View\Component;

class ServiceComponent extends Component
{

    public $categories_services;

    public function __construct()
    {
        $this->categories_services = Category::with('services')
        ->whereHas('parent')
        ->latest()

        ->get();

    }

    public function render()
    {
        return view('components.frontend.service-component');
    }
}
