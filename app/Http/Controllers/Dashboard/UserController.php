<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        $data['pagename'] = 'اعضاء المنصة';
        $data['users'] = DB::table('users')->latest()->paginate(10);
        return view('dashboard.users.index',$data);
    }

    function fetch_data(Request $request)
    {
        if($request->ajax()){
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
                    $query = $request->get('query');
                    $query = str_replace(" ", "%", $query);
            $data['users'] = DB::table('users')
                            ->where('id', 'like', '%'.$query.'%')
                            ->orWhere('email', 'like', '%'.$query.'%')
                            ->orWhere('first_name', 'like', '%'.$query.'%')
                            ->orWhere('last_name', 'like', '%'.$query.'%')
                            ->latest()
                            ->paginate(10);
            return view('dashboard.users.pagination_data',$data)->render();
        }
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
