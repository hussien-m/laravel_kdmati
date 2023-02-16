<?php

namespace App\View\Components\Frontend;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class CategoryMenu extends Component
{
    public $categories;

    public function __construct()
    {

        $this->categories = DB::table('categories AS c')
                                ->select('c.id','c.name','c.slug',)
                                ->where('parent_id',0)
                                ->get();

                               // dd( $this->categories);


    }


    public function render()
    {
        return view('components.frontend.category-menu');
    }
}
