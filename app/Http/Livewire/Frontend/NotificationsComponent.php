<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationsComponent extends Component
{

    public $unreadnotificationsCount = '';
    public $unreadnotifications;

    public function getListeners():array
    {
        $user = Auth::user()->id;
        return [
            "echo-notification:App.Models.User.{$user},notification" => 'mount'
        ];
    }

    public function mount()
    {
        $user = Auth::user();
        $this->unreadnotificationsCount = $user->unreadNotifications->where('type', 'App\Notifications\Frontend\AcceptUserService')->count();
        $this->unreadnotifications = $user->notifications()->where('type', 'App\Notifications\Frontend\AcceptUserService')->latest()->get();
    }

    public function markAsRead($id)
    {
        $notify = Auth::user()->Notifications->where('id',$id)->first();
        if($notify->read_at == null){
            $notify->markAsRead();
        }

        return redirect()->to($notify->data['url']);
    }

    public function render()
    {
        return view('livewire.frontend.notifications-component');
    }
}
