<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowMessages extends Component
{
    public $messages;
    public $conversation_id;
    public static $user;

    public function updateMessages()
    {
        $this->messages = Message::where('conversation_id',$this->conversation_id)->get();
    }


    public function getListeners():array
    {

        $user = Auth::user()->id;

        return
        [
            'updateMessages' => 'updateMessages',
            "echo-notification:App.Models.User.$user,notification" => 'mount',

        ];
    }

    public function mount()
    {

        $this->messages = Message::where('conversation_id',$this->conversation_id)->get();
    }

    public function render()
    {

        return view('livewire.frontend.show-messages');
    }
}
