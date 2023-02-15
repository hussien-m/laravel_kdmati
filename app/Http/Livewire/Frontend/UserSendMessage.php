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
    public $unread;
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
        //$user    = Auth::user()->id;

        $user      = Auth::user();
       // $this->unreadnotificationsCount = $user->unreadNotifications->where('type','App\Notifications\Frontend\UserSendMessage')->count();
       $this->unread = $user->notifications->where('type','App\Notifications\Frontend\UserSendMessage');

        //$this->notiyDate = Message::where('sender_id','!=',Auth::user()->id)->select('created_at')->latest('created_at')->first();

        $this->unreadnotificationsCount = $user->unreadNotifications->where('type','App\Notifications\Frontend\UserSendMessage')->count();



        $this->unreadnotifications = Conversation::with('messages')
                ->where('receiver_id',Auth::user()->id)
                ->orWhere('sender_id',Auth::user()->id)
                ->latest()
                ->get();


                /*

        $this->unreadnotifications = DB::table('conversations')
                ->join('messages','conversations.id','messages.conversation_id')
                ->join('services','services.id','conversations.service_id')
                ->where('messages.receiver_id',Auth::user()->id)
                ->orWhere('messages.sender_id',Auth::user()->id)
                ->select(
                    'conversations.id as conv_id','conversations.sender_id as conv_sender_id', 'conversations.receiver_id as conv_receiver_id','conversations.service_id as conv_service_id',
                    'services.id as serv_id','services.title as serv_title','services.slug as serv_slug',
                    'messages.id as msg_id','messages.created_at as msg_created_at'
                )
                //->latest()
                ->get();

              // dd( $this->unreadnotifications);
              */
    }

    public function render()
    {
        return view('livewire.frontend.user-send-message');
    }
}
