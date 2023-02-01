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
        $this->unreadnotificationsCount = $user->unreadNotifications->count();
        $this->unreadnotifications = $user->unreadNotifications;

    }
    public function render()
    {
        return view('livewire.frontend.notifications-component');
    }
}
