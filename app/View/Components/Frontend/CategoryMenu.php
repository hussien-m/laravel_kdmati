<?php

namespace App\View\Components\Frontend;

use App\Models\Category;
use Illuminate\View\Component;

class CategoryMenu extends Component
{
    public $categories;

    public function __construct()
    {
        $this->categories = Category::whereHas('parent')->orderBy('id','DESC')->get();
    }


    public function render()
    {
        return view('components.frontend.category-menu');
    }
}
