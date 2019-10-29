<?php

namespace App\Http\Controllers\Web\Msg;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Notification;
use App\Lib\MsgContent;
use App\Notifications\Msg;
 
class Msg_cont extends Controller
{
    public function send(Request $request){
        if($request->isMethod('post')){
                switch($request->input('to')){
                        case'admin':
                            $users=User::where('rule','admin')->get();
                            break;

                        case 'editor':
                            $users=User::where('rule','editor')->get();
                            break;

                        case 'all':
                            $users=User::where('rule','admin')->orWhere('rule','editor')->get();
                            break;

                        default:
                        $users=User::find($request->input('to'));
                }
                 $msg=new MsgContent($request->input('email'),$request->input('sender-name'),$request->input('phone'),$request->input('content'));

                Notification::send($users,new Msg($msg));
                return redirect()->back();
        }else{
            $arr['users']=User::select('id','name')->where('rule','admin')->orWhere('rule','editor')->get();
            return view('Web.Msg.Msg_view',$arr);
        }
    }
}
