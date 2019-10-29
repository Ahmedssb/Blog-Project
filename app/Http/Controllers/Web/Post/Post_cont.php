<?php

namespace App\Http\Controllers\Web\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Comment;
use Illuminate\Support\Facades\Auth;

class Post_cont extends Controller
{
    public function index (Request $request,$id){
        $post=Post::find($id);
        if($request->isMethod('post')){
          //handel the comment for the post 
          $post->Comments()->create([
            'content'=>$request->input('comment'),
            'user_id'=>Auth::user()->id
          ]);

          return redirect()->back();
        }else{

            $arr['post']=$post;
            $arr['comments']=$post->Comments;
            return view('Web.Post.Index_view',$arr);
        }

    }

    public function editComment(Request $request , $id ){
      $comment=Comment::find($id);
      $user=Auth::user();
      $section=$comment->Post->Section;
      $post=$comment->Post;
          /* use the comment policy   
          user can edit comment only if he is the owner of the comment 
          or he is the admin or editor for the section*/
      if($user->can('editComment',$comment) or $user->can('control_post',$section)){

           if($request->isMethod('post')){
             $comment->content=$request->input('comment');
             $comment->update();
 
              return redirect(route('Web.Post.Index',['id'=>$post->id]));
           }else{
             $arr['comment']=$comment;
             $arr['post']=$post;
                return view('Web.Post.Edit_comment_view',$arr);
           }

      }else{
        dd('canot');
      }

    }


    public function deleteComment($id){
      $comment=Comment::find($id);
      $user=Auth::user();
      $section=$comment->Post->Section;

          /* use the comment policy   
          user can delete comment only if he is the owner of the comment 
          or he is the admin or editor for the section*/
      if($user->can('editComment',$comment) or $user->can('control_post',$section)){
        $comment->delete();

        return redirect()->back();
       }


    }
}
