<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ServicesController extends Controller
{
    public function create()
    {
        $data['categories']= Category::whereHas('children')->latest()->get();
        return view('frontend.service.create',$data);
    }

    public function post(Request $request)
    {
        $request->validate([
            'images' => 'required',
        ]);

        DB::beginTransaction();

        try{

        //SELECT MAX(id) FROM services
        $last_id = DB::table('services')->max("id");

        $last_id= ($last_id == null) ? $last_id =1 : $last_id = $last_id+1;

        $slug =str_replace(' ','-',$request->title);
        $new_service = Service::create([

            'title'        => $request->title,
            'category_id'  => $request->category_id,
            'sub_category_id'   => $request->sub_cat_id,
            'user_id'      => Auth::user()->id,
            'description'  => $request->description,
            'images'       => $request->images,
            'youtube'      => $request->youtube,
            'tags'         => $request->tags,
            'duration'     => $request->duration,
            'instructions' => $request->instructions,
            'slug'         => $last_id.'-'.$slug,
            'status'        =>1,

            ]);

            //insert to AddonsService table

            if($request->addon_title != null){

                for ($i = 0; $i < count($request->addon_title); $i++) {

                    $new_service->addons()->create([
                        'title'      => $request->addon_title[$i],
                        'price'      => $request->addon_price[$i],
                        'duration'   => $request->addon_duration[$i],
                        'service_id' => $new_service->service_id
                    ]);

                }

            }


            DB::commit();

        } catch(Exception $ex) {
            DB::rollBack();
            return $ex->getMessage();
        }


    }

    public function categorySlug(Request $request,$slug)
    {
        $slug_id            = Category::whereSlug($slug)->select('id','slug')->firstOrFail();

        $data['categories'] = Category::with('servicesSub','parent','services')
                                ->withCount('servicessub','parent','services')
                                ->whereHas('children')
                                ->latest()
                                ->get();

        if($request->ajax()){

            $data['services']   = Service::where('sub_category_id',$slug_id->id)
                                    ->where('status',1)
                                    ->get();
            return view('frontend.categories._row_serives',$data);

        } else {

            $data['services']   = Service::where('category_id',$slug_id->id)->where('status',1)->get();

            return view('frontend.categories.cat_slug',$data);

      }
    }

    public function ajaxManinCategory(Request $request, $slug)
    {


            $slug_id            = Category::whereSlug($slug)->select('id','slug')->firstOrFail();

            $data['categories'] = Category::with('parent')->whereHas('parent')->latest()->get();

            $data['services']   = Service::where('sub_category_id',$slug_id->id)->where('status',1)->get();


            if($request->ajax()) {

                return view('frontend.categories._row_serives',$data);

            } else {

                return view('frontend.categories.cat_slug',$data);
            }



    }

    public function service($slug)
    {
        $data['service'] = Service::with(['category','subCategory'])->whereSlug($slug)->first();

        return view("frontend.service.show",$data);
    }


}
