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
        /*
        SELECT     c.id, c.name, parents.name AS `ParentCategoryName`
            FROM       categories AS c
            INNER JOIN  categories AS parents ON parents.id = c.parent_id
            ORDER BY   c.name ASC;
        */
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
