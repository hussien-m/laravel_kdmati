<?php
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

if(!function_exists('isAdminActive'))
{
    function isAdminActive($email) : bool
    {
        $admin = Admin::whereEmail($email)->isActive()->exists();

        return $admin ? true : false;
    }
}

if(!function_exists('toast'))
{
    function toast($message,$type)
    {
        $msg = "message";
        $tp  = "type";
        session()->flash($msg,$message);
        session()->flash($tp,$type);
    }
}



if(!function_exists('getAdminpage'))
{
    function getAdminpage($page_name)
    {
        return view('dashboard.admin.'.$page_name);
    }
}

if(!function_exists('getAdminpageWithFloder'))
{
    function getAdminpageWithFloder($folder,$page_name)
    {
        return view('dashboard.admin.'.$folder.'.'.$page_name);
    }
}

if(!function_exists('printMsg'))
{
    function printMsg()
    {
       if(\Illuminate\Support\Facades\Auth::guard('web')->check()){
           return "User";
       } else {
           return "Admin";
       }
    }
}


