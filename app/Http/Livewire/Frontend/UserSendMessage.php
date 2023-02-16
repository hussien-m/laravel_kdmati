<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserSendMessage extends Component
{
    public $unreadnotificationsCount = '';
    public $unreadnotifications;
    protected $unread = null;
    public $notiyDate="";

    public function getListeners():array
    {
        $user = Auth::user()->id;

        return [
            "echo-notification:App.Models.User.{$user},notification" => 'mount'
        ];
    }

    public function markAsRead($id)
    {
        $notify = Auth::user()->Notifications->where('id',$id)->first();
        if($notify->read_at == null){
            $notify->delete();
        }

        return redirect()->to($notify->data['url']);
    }

    public function mount()
    {

        $user = Auth::user();
        $userId = $user->id;

        // استخدام الكشف المبكر والتعبير الأكثر فعالية
        $userNotifications = $user->notifications();
        $this->unread = $userNotifications->where('type', 'App\Notifications\Frontend\UserSendMessage');

        $userUnreadNotifications = $user->unreadNotifications;
        $this->unreadnotificationsCount = $userUnreadNotifications->where('type', 'App\Notifications\Frontend\UserSendMessage')->count();

        // التحقق من وجود فهارس على العمود المستخدم في `latest()`
        $this->unreadnotifications = Conversation::with('messages')
                        ->where(function ($query) use ($userId) {
                            $query->where('receiver_id', $userId)
                                  ->orWhere('sender_id', $userId);
                        })
                        ->latest('created_at')
                        ->get();




    }

    public function render()
    {
        return view('livewire.frontend.user-send-message');
    }
}
