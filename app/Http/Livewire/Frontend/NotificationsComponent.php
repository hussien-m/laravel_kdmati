<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationsComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public $unreadnotificationCount='';
    public $unreadnotification;

    public function getListeners():array
    {

        $userId = Auth::guard('web')->user()->id;
        //dd($userId);
        return [
            "echo-notification:App.Models.User.{$userId},notification" => 'mount'
        ];
    }

    public function mount()
    {
        $this->unreadnotificationCount = Auth::user()->unreadNotifications()->count();
        $this->unreadnotification = Auth::user()->unreadNotifications;
    }

    public function render()
    {
        return view('livewire.frontend.notifications-component');
    }
}
