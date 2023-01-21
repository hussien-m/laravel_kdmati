<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notifications extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public $unreadnotificationCount='';
    public $unreadnotification;

    public function getListeners():array
    {
       $userId = auth()->user()->id;

        return [

            "echo-notification:App.Models.Admin.{$userId},notification" => 'mount'
        ];
    }

    public function mount()
    {
        $this->unreadnotificationCount = Auth::guard()->user()->unreadNotifications()->count();
        $this->unreadnotification = Auth::guard()->user()->unreadNotifications;
    }

    public function render()
    {
        return view('livewire.dashboard.notifications');
    }
}
