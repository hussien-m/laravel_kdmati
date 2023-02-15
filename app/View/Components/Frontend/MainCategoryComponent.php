<?php

namespace App\View\Components\Frontend;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class MainCategoryComponent extends Component
{

    public $categories;

    public function __construct()
    {
        //$this->categories= Category::whereHas('parent')->latest()->get();
        $this->categories= DB::table('categories')
                            ->where('parent_id',0)
                            ->select('id','name','slug','image')
                            ->latest()
                            ->get();
    }


    public function render()
    {
        return view('components.frontend.main-category-component');
    }
}
