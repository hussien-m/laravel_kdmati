<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends DashboardController
{

    public function index()
    {
        $data['pagename'] = "التصنيفات";

        $data['categories']= Category::whereHas('parent')->latest()->get();

       // dd($data['categories']);

        return view('dashboard.categories.index',$data);
    }

    public function subCategory(Request $request,$slug)
    {
       $data['categories'] = Category::whereSlug($slug)->with('parent')->first();
       $data['pagename']   = $data['categories']->name ;
       $data['categories'] = $data['categories']->parent;

       return view('dashboard.categories.sub-category',$data);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }
    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
