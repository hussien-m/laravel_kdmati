<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Service;
use App\Models\User;
use App\Notifications\Frontend\UserSendMessage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    public function showFormMessage(Request $request)
    {
        $data['service'] = Service::findOrFail($request->service_id)->first();

        $data['service']->load('user');

        return view("frontend.messages.form",$data);
    }

    public function sendMessage(Request $request)
    {

        $conversation = Conversation::get();
        $service = Service::where('id',$request->service_id)->first();
        $service_name = $service->title;

        $receiver_user = User::findOrfail($service->user->id);
        //dd($receiver_user);
        foreach($conversation as $c){
        $url  = route("show.messages",$c->id);

            if($c->receiver_id == $request->receiver_id and $c->sender_id == Auth::user()->id and $c->service_id == $request->service_id)
            {

                //$url  = route("show.messages",$c->id);
                Message::create([
                    'sender_id' => Auth::user()->id,
                    'message' => $request->message,
                    'conversation_id' => $c->id,
                ]);

                $receiver_user->notify(new UserSendMessage($url,$service_name));

                return back();

            }

        }

        DB::beginTransaction();
        try{

                $conv = new Conversation();
                $conv->sender_id   = Auth::user()->id;
                $conv->receiver_id = $request->receiver_id;
                $conv->save();

                $message = new Message();
                $message->sender_id=Auth::user()->id;
                $message->receiver_id=$request->receiver_id;
                $message->message = $request->message;
                $message->conversation_id =  $conv->id;
                $message->save();


                $url2 = route("show.messages",$message->conversation_id);


                $sender_user = User::findOrfail($request->sender_id);


                $sender_user->notify(new UserSendMessage($url2,$service_name));

                $receiver_user->notify(new UserSendMessage($url2,$service_name));


                DB::commit();
                return back();

        }catch(Exception $ex){

            DB::rollBack();
            return $ex->getMessage();
        }




    }

    public function showMessage($conv_id)
    {

        $data['conversation']  = Conversation::where('id',$conv_id)->with('service')->firstOrfail();
        $data['service']= $data['conversation']->service;

        $data['messages'] = Message::where('conversation_id',$conv_id)->get();

        if(Auth::user()->id === $data['service']->user->id  or Auth::user()->id === $data['conversation']->sender->id  ){

            return view('frontend.messages.show',$data);
        }
        return redirect()->route('user.index.page');
    }

    public function uploadRecord(Request $request)
    {

        define('RECORDPATH', $_SERVER['DOCUMENT_ROOT']);

        $size = $_FILES['audio_data']['size'];

        $input = $_FILES['audio_data']['tmp_name'];

        $output = $_FILES['audio_data']['name'].".wav";

        $target_path = DIRECTORY_SEPARATOR.'records'.DIRECTORY_SEPARATOR;

                $temp = explode('.', $_FILES['audio_data']['name']);
                $ex =strtolower(end($temp));

                $allowed = array('php', 'exe', 'jpg','zip','mp4','jpeg','PNG','JPG','mp3','pdf','doc','docs','excel','xlsx','wav','webp','WEBP','jfif','gif','GIF');

                if (!in_array($ex, $allowed) && $ex != '' && !empty($ex)) {

                $rand = rand();

                $newfilename = $rand . round(microtime(true)) . '.wav';

                $target_path = $target_path . $newfilename;

                move_uploaded_file($input, RECORDPATH . $target_path);

                echo $newfilename;

                }
    }

    public function sendMessageNow(Request $request)
    {
        if($request->ajax()){
            //dd($request->all());
            $conversation  = $request->conversation_id;
            $conv          = Conversation::findOrFail($conversation);
            $url           = route("show.messages",$conv->id);
            $service       = $conv->service;
            $service_name  = $service->title;

            DB::beginTransaction();
            try{
                Message::create([
                    'sender_id'        => Auth::user()->id,
                    'message'          => $request->message,
                    'conversation_id'  => $conv->id,
                    'record'           => $request->record,
                    'files'            => $request->post('files'),
                ]);


                if($conv->sender_id == Auth::user()->id ){

                    $conv->receiver->notify(new UserSendMessage($url,$service_name));
                    $conv->sender->notify(new UserSendMessage($url,$service_name));
                }

                if($conv->receiver_id == Auth::user()->id ){

                    $conv->receiver->notify(new UserSendMessage($url,$service_name));
                    $conv->sender->notify(new UserSendMessage($url,$service_name));
                }




               DB::commit();



                return response()->json([
                  'test'     => 'test',
                  'message' => $request->message,
                  'conversation_id' => $conv->id,
                  'record' => $request->record ?? null,
                  'files' => $request->post('files') ?? null,
                ],200);






            }catch(Exception $ex){
                DB::rollBack();
                return response()->json([
                    'data' => $ex->getMessage(),
                   ],201);
            }


        }

    }
}
