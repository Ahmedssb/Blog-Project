<?php

namespace App\Http\Controllers\Admin\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Post;
use App\Model\Comment;

class Main_cont extends Controller
{
    public function index(){
        // get the three last users , posts and comments
        $users=User::select('id','name','email')->orderBy('id','desc')->take(3)->get();
        $posts=Post::select('id','title','user_id')->orderBy('id','desc')->take(3)->get();
        $comments=Comment::orderBy('id','desc')->take(3)->get();
        
        $arr['users']=$users;
        $arr['posts']=$posts;
        $arr['comments']=$comments;
        return view('Admin.Main_view',$arr);
     }
}
