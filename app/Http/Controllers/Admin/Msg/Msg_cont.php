<?php

namespace App\Http\Controllers\Admin\Msg;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class Msg_cont extends Controller
{   //@param type is parameter that will identify the type of messageuser select  [ all , read , unread] 
    public function index($type){
        $user=Auth::user();

       switch($type){
           case 'All':
            $msgs=$user->notifications;
            break;

          case 'Read':
           $msgs=$user->readNotifications;
            break;

          case 'UnRead':
           $msgs=$user->UnreadNotifications;
            break;

        default:
        return redirect()->back();
       }

        $arr['msgs']=$msgs;
      
    
        return view('Admin.Msg.Index_view',$arr);
        
    }


    public function read($id){
        $user=Auth::user();
        $msg=$user->notifications()->find($id);
        // mark the massage as readed massage 
        $msg->markAsRead();
        $arr['msg']=$msg;
        return view('Admin.Msg.Read_view',$arr);
    }

    public function delete($id){
        $user=Auth::user();
        $msg=$user->notifications()->find($id);
        $msg->delete();

        return redirect()->back()->with('msg','Massage Deleted Successfully');
    }
}
