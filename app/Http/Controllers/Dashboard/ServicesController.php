<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Models\Service;
use App\Notifications\Frontend\AcceptUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
class ServicesController extends DashboardController
{
    public function index()
    {
        $data['pagename'] = "الخدمات";

        $data['services'] = Service::with(['category','subCategory','user'])->latest()->get();

        return view('dashboard.services.index',$data);
    }

    public function service($id)
    {
       return Service::findOrFail($id);
    }
    public function activate($id)
    {
        $service = $this->service($id);
        $service->load('user');
        $user = $service->user;
        $message = "مبروك تم تفعيل خدمتك :";
        $service_title = " ($service->title)";
        Notification::send($user,new AcceptUserService($message,$service_title));

        $service->status = 1;
        $service->save();
        toast("تم تفعيل الخدمة",'success');
        //return back();

    }
    public function deActivate($id)
    {
        $service = $this->service($id);
        $service->status = 0;
        $service->save();
        toast("تم تعطيل الخدمة",'success');
        return back();
    }
}
