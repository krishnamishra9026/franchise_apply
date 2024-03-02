<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\ChatFile;
use App\Models\Administrator;
use App\Models\Seller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use URL;
use Auth;

class InboxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:seller');
    }

    public function Inbox()
    {
        return view('seller.inbox.inbox');
    }
    public function Chat()
    {
        $admin = Administrator::find(1);
        if($admin->avatar){
            $admin->path = asset('storage/uploads/admin/'.$admin->avatar);
        }
        return view('seller.inbox.chat',compact('admin'));
    }
    public function getMessages(){
        $admin = Administrator::find(1);
           $id             = Auth::guard('seller')->id();
           $seller          = Seller::find($id);
            $messages=Chat::query()
                            ->where(function($query) use ($id) {
                                  $query->where('sendor','seller')
                                     ->Where('sendor_id',$id);
                            })
                            ->orwhere(function($query) use ($id) {
                                  $query->where('receiver','seller')
                                     ->Where('receiver_id',$id);
                            })
                  ->orderBy('id','asc')->get();

         $html='';
        foreach($messages as $message){
            if($message->sendor=='admin'){
              $html .= '<li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="http://localhost:8000/assets/images/users/avatar-1.jpg" class="rounded" alt="dominic" />
                                    <i>'.checkTime($message->created_at).'</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>'.$admin->firstname.'</i>
                                        <p>
                                           '.$message->message.'
                                         </p>';
            foreach($message->files as $file){
                $path = asset('storage/uploads/files/'.$file->name);
              $html .= '<p><a href="'. $path .'" download>'.$file->name.'</a></p>';
            }

             $html .=                        '</div>
                                </div>
                            </li>';
             
            }else{
             $html .=  '<li class="clearfix odd">
                                <div class="chat-avatar">
                                    <img src="http://localhost:8000/assets/images/users/avatar-1.jpg" class="rounded" alt="Shreyu N" />
                                    <i>'.checkTime($message->created_at).'</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>'.$seller->firstname.' '.$seller->lastname.'</i>
                                        <p>
                                            '.$message->message.'
                                          </p>';
            foreach($message->files as $file){
                $path = asset('storage/uploads/files/'.$file->name);
              $html .= '<p><a href="'. $path .'" download>'.$file->name.'</a></p>';
            }

             $html .=                        '</div>
                                </div>
                            </li>';

            }
        }
       

        return response()->json(
            [
              'html' => $html,
            ]
        );
    }
    public function storeMessage(Request $request){
        $chat            = new Chat();
        $chat->receiver    = 'admin';
        $chat->receiver_id = '1';
        $chat->sendor    = 'seller';
        $chat->sendor_id = Auth::guard('seller')->id();
        $chat->message = $request->message;
        $chat->status = 'unread';
        $chat->admin_status = '0';
        $chat->save();

         if ($request->totalFilesToBeUploaded > 0) {
            for ($x = 0; $x < $request->totalFilesToBeUploaded; $x++) {
                if ($request->hasFile('files' . $x)) {
                    $file = $request->file('files' . $x);
                    $name = $file->getClientOriginalName();
                    $file->storeAs('uploads/files/', $name, 'public');
                    $extension = $file->getClientOriginalExtension();
                    $insert[$x]['chat_id'] = $chat->id;
                    $insert[$x]['name'] = $name;
                    $insert[$x]['type'] = $extension;
                }
            }
            ChatFile::insert($insert);
        }
         return response()->json(
            [
              'success' => 'message saved',
            ]
        );
    }
}
