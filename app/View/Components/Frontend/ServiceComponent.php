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
        $data['business_service'] = Service::with(['user','category','addons'])
                                        ->where('category_id',30)
                                        ->latest()
                                        ->get();

        $data['cat-slug'] = DB::table('categories')
            ->where('id',30)
            ->select('slug')
            ->first();
        $data['slug'] = $data['cat-slug']->slug;
        return view('components.frontend.service-component',$data);
    }
}
