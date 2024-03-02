<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\ChatFile;
use App\Models\Administrator;
use App\Models\Seller;
use App\Models\Buyer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use URL;


class InboxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:administrator');
        $this->middleware(['permission:inbox']);
    }

    public function inbox()
    {
        $chats = Chat::query()->orderBy('id','desc')->get();
        $active = Chat::where('admin_status','1')->first();
        return view('admin.inbox.inbox',compact('active'));
    }
    
    public function getSender(Request $request){
        $admin = Administrator::find(1);
        $search = $request->search;
        if($search){
          $matchingSellerIds = Seller::where('firstname', 'LIKE', '%'.$search.'%')
                      ->orwhere('lastname', 'LIKE', '%'.$search.'%')
                      ->pluck('id')->toArray();
          $matchingBuyerIds = Buyer::where('firstname', 'LIKE', '%'.$search.'%')
                      ->orwhere('lastname', 'LIKE', '%'.$search.'%')
                      ->pluck('id')->toArray();
        $chats =  Chat::query()->where(function($query) use ($matchingSellerIds) {
                                $query->where('sendor','seller')
                                     ->whereIn('sendor_id',$matchingSellerIds);
                            })
                            ->orwhere(function($query) use ($matchingSellerIds) {
                                $query->where('receiver','seller')
                                     ->whereIn('receiver_id',$matchingSellerIds);
                            })
                            ->orwhere(function($query) use ($matchingBuyerIds) {
                                $query->where('sendor','buyer')
                                     ->whereIn('sendor_id',$matchingBuyerIds);
                            })
                            ->orwhere(function($query) use ($matchingBuyerIds) {
                                $query->where('receiver','buyer')
                                     ->whereIn('receiver_id',$matchingBuyerIds);
                            })
                            ->orwhere('message','LIKE','%'.$search.'%')
                            ->orderBy('id','desc')->get();
        }else{
            $chats = Chat::query()->orderBy('id','desc')->get();
        }

       
        
        $senders=array();
        $buyers =array();
        $recent_chats=[];
        foreach($chats as $chat){
            if($chat->receiver=='admin'){
                if($chat->sendor == 'seller' && !in_array($chat->sendor_id, $senders)){
                    array_push($senders,$chat->sendor_id);
                    $id=$chat->sendor_id;
                    $seller = Seller::find($id);
                    $count = Chat::query()->where(function($query) use ($id) {
                                  $query->where('sendor','seller')
                                     ->Where('sendor_id',$id)
                                     ->where('status','unread');
                            })->count();
                    $recent_chats[$chat->id] = array(
                            'id'        => $chat->id,
                            'type'      => 's',
                            'message'   => $chat->message,
                            'name'      => $seller->firstname.' '.$seller->lastname,
                            'time'      => checkTime($chat->created_at),
                            'count'     => ($count>0)?$count:''
                    );
                }
                if($chat->sendor == 'buyer' && !in_array($chat->sendor_id, $buyers)){
                   array_push($buyers,$chat->sendor_id);
                   $id=$chat->sendor_id;
                   $buyer = Buyer::find($id);
                   $count = Chat::query()
                            ->where(function($query) use ($id) {
                                  $query->where('sendor','buyer')
                                     ->Where('sendor_id',$id)
                                     ->where('status','unread');
                            })->count();
                   $recent_chats[$chat->id] = array(
                            'id'        => $chat->id,
                            'type'      => 'b',
                            'message'   => $chat->message,
                            'name'      => $buyer->firstname.' '.$buyer->lastname,
                            'time'      => checkTime($chat->created_at),
                            'count'     => ($count>0)?$count:''
                    );
                }

            }else{
               if($chat->receiver == 'seller' && !in_array($chat->receiver_id, $senders)){
                    array_push($senders,$chat->receiver_id);
                    $id=$chat->receiver_id;
                    $seller = Seller::find($id);
                     $count = Chat::query()->where(function($query) use ($id) {
                                  $query->where('sendor','seller')
                                     ->Where('sendor_id',$id)
                                     ->where('status','unread');
                            })->count();
                    $recent_chats[$chat->id] = array(
                            'id'        => $chat->id,
                            'type'      => 's',
                            'message'   => $chat->message,
                            'name'      => $seller->firstname.' '.$seller->lastname,
                            'time'      => checkTime($chat->created_at),
                            'count'     => ($count>0)?$count:''
                    );
                }
                if($chat->receiver == 'buyer' && !in_array($chat->receiver_id, $buyers)){
                   array_push($buyers,$chat->receiver_id);
                   $id = $chat->receiver_id;
                   $buyer = Buyer::find($id);
                    $count = Chat::query()->where(function($query) use ($id) {
                                  $query->where('sendor','seller')
                                     ->Where('sendor_id',$id)
                                     ->where('status','unread');
                            })->count();
                   $recent_chats[$chat->id] = array(
                            'id'        => $chat->id,
                            'type'      => 'b',
                            'message'   => $chat->message,
                            'name'      => $buyer->firstname.' '.$buyer->lastname,
                            'time'      => checkTime($chat->created_at),
                            'count'     => ($count>0)?$count:''
                    );
                }

            }
        }

        $html ='';
        foreach($recent_chats as $chat){

            $html .= '<a href="javascript:void(0);" data-id='.$chat['id'].' class="text-body user-list">';
            $html .=    '<div class="d-flex align-items-start mt-1 p-2">';
            $html .=       '<img src="'. asset('assets/images/avatar.png') .'" class="me-2 rounded-circle" height="48" alt="Brandon Smith" />';
            $html .= '<div class="w-100 overflow-hidden">';
            $html .= '<h5 class="mt-0 mb-0 font-14">
                                                            <span class="float-end text-muted font-12">'.$chat['time'].'</span>
                                                            '. $chat['name'] .'
                                                            ('.$chat['type'].')
                                                        </h5>
                                                        <p class="mt-1 mb-0 text-muted font-14">
                                                            <span class="w-25 float-end text-end"><span class="badge badge-danger-lighten">'.  $chat['count'] .'</span></span>
                                                            <span class="w-75">'. $chat['message'] .'</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>';

        }

        return response()->json(
            [
              'html' => $html,
            ]
        );
    }
    public function getActiveSender(){
        $active = Chat::query()->where('admin_status','1')->first();
        $data=array();
        if($active->sendor=='admin'){
           if($active->receiver=='seller'){
                $seller = Seller::find($active->receiver_id);
                $data = array(
                'user_id' => $active->receiver_id,
                'type'   => $active->receiver,
                'name' => $seller->firstname.' '.$seller->lastname,
                'email' => $seller->email,
                'phone' => $seller->phone,
                'last_interact' => checkTime($active->created_at),
               );

           }else{
               $buyer = Buyer::find($active->receiver_id);
               $data = array(
                'user_id' => $active->receiver_id,
                'type'   => $active->receiver,
                'name' => $buyer->firstname.' '.$buyer->lastname,
                'email' => $buyer->email,
                'phone' => $buyer->phone,
                'last_interact' => checkTime($active->created_at),
               );

           }
           
        }else{
           if($active->sendor=='seller'){
            $seller = Seller::find($active->sendor_id);
            $data = array(
            'user_id' => $active->sendor_id,
            'type'   => $active->sendor,
            'name' => $seller->firstname.' '.$seller->lastname,
            'email' => $seller->email,
            'phone' => $seller->phone,
            'last_interact' => checkTime($active->created_at),
             );

           }else{
            $buyer = Buyer::find($active->sendor_id);
            $data = array(
            'user_id' => $active->sendor_id,
            'type'   => $active->sendor,
            'name' => $buyer->firstname.' '.$buyer->lastname,
            'email' => $buyer->email,
            'phone' => $buyer->phone,
            'last_interact' => checkTime($active->created_at),
           );

           }
        }

        return response()->json(
            [
              'active' => $data,
            ]
        );
    }
    public function getActiveMessages(){
        $user_path = asset('assets/images/avatar.png');
        $admin = Administrator::find(1);
        $admin->avatar  = isset($admin->avatar) ? asset('storage/uploads/admin/'.$admin->avatar) : URL::to('assets/images/users/avatar.png') ;
        $active = Chat::query()->where('admin_status','1')->first();
         $data=array();
        if($active->sendor=='seller'){
            $seller = Seller::find($active->sendor_id);
           $data = array(
            'name' =>  $seller->firstname.' '. $seller->lastname,
            'email' =>  $seller->email,
            'phone' =>  $seller->phone,
            'last_interact' => checkTime($active->created_at),
           );
        }else{
            $buyer = Buyer::find($active->sendor_id);
           $data = array(
            'name' => $buyer->firstname.' '.$buyer->lastname,
            'email' => $buyer->email,
            'phone' => $buyer->phone,
            'last_interact' => checkTime($active->created_at),
           );
        }

        if($active->receiver=='seller'){
            $seller = Seller::find($active->receiver_id);
           $data = array(
            'name' =>  $seller->firstname.' '. $seller->lastname,
            'email' =>  $seller->email,
            'phone' =>  $seller->phone,
            'last_interact' => checkTime($active->created_at),
           );
        }else{
            $buyer = Buyer::find($active->receiver_id);
           $data = array(
            'name' => $buyer->firstname.' '.$buyer->lastname,
            'email' => $buyer->email,
            'phone' => $buyer->phone,
            'last_interact' => checkTime($active->created_at),
           );
        }


        if($active->receiver =='admin'){
            $messages=Chat::with('files')
                            ->where(function($query) use ($active) {
                                  $query->where('sendor',$active->sendor)
                                     ->Where('sendor_id',$active->sendor_id);
                            })
                            ->orwhere(function($query) use ($active) {
                                  $query->where('receiver',$active->sendor)
                                     ->Where('receiver_id',$active->sendor_id);
                            })
                  ->orderBy('id','asc')->get();
        }else{
             $messages=Chat::with('files')
                            ->where(function($query) use ($active) {
                                  $query->where('sendor',$active->receiver)
                                     ->Where('sendor_id',$active->receiver_id);
                            })
                            ->orwhere(function($query) use ($active) {
                                  $query->where('receiver',$active->receiver)
                                     ->Where('receiver_id',$active->receiver_id);
                            })
                  ->orderBy('id','asc')->get();
        }
         $html='';
        foreach($messages as $message){
            if($message->sendor=='admin'){

              $html .= '<li class="clearfix odd">
                                <div class="chat-avatar">
                                    <img src="'.$admin->avatar.'" class="rounded" alt="dominic" />
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
             $html .=  '<li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="'.$user_path.'" class="rounded" alt="Shreyu N" />
                                    <i>'.checkTime($message->created_at).'</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>'.$data["name"].'</i>
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
        Chat::query()->update([
              'admin_status' => '0',
        ]);
        $chat            = new Chat();
        $chat->receiver    = $request->type;
        $chat->receiver_id = $request->user_id;
        $chat->sendor    = 'admin';
        $chat->sendor_id = '1';
        $chat->message = $request->message;
        $chat->status = 'unread';
        $chat->admin_status = '1';
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
    public function storeActiveMessage(Request $request){
        Chat::query()->update([
              'admin_status' => '0',
        ]);
        $chat = Chat::find($request->chat_id);
        $chat->update([
              'admin_status' => '1',
        ]);
        Chat::where('sendor',$chat->sendor)
              ->where('sendor_id',$chat->sendor_id)
              ->update(
            [
                'status'=>'read',
            ]);
        return response()->json(
            [
              'success' => 'message saved',
            ]
        );

    }
}
