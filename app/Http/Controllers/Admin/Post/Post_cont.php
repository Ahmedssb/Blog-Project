<?php

namespace App\Http\Controllers\Admin\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Section;
use App\Model\Photo;
use App\Model\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class Post_cont extends Controller
{

  public function index(){
      $posts=Post::where('section_id','like',$this->getFlag())->get();
      $arr['posts']=$posts;
      return view('Admin.Post.Index_view',$arr);
  }

  public function add(Request $request){
    $user=Auth::user();
     if($request->isMethod('post')){
            //dd($request->input('photos'));
           
            $section=Section::find($request->input('section_id'));
             
             //add_post is the name of fun from the Section_policy policy 
            if($user->can('control_post',$section)){
                $post=$user->posts()->create($request->all());
                $post->photos()->attach($request->input('photos'));
                return redirect()->back();
            
            }else{
                return redirect()->back()->withErrors('you have no permission');
            }
         
     }else{
       
         $sections=Section::where('id','like',$this->getFlag())->get();
         $photos=Photo::all();
         $arr['sections']=$sections;
         $arr['photos']=$photos;
         return view('Admin.Post.Add_view',$arr);
     }

  }

   protected function getFlag(){
    $user=Auth::user();
        $flag='%';
        if($user->rule=='editor'){
            $flag= $user->Section->id;
        }

        return $flag;
   }
   
   public function update(Request $request ,$id){
  
       $post=Post::find($id);
       $user=Auth::user();
       if($user->can('control_post',$post->Section)){

        if($request->isMethod('post')){
            $post->update($request->all());
            //unlink all post photos 
            $post->Photos()->detach();
            //link photos user selected with post
            $post->Photos()->attach($request->input('photos'));
   
            return redirect()->back()->with('msg','Post Updated Successfully');
   
          }else{
           $photos=Photo::all();
           $arr['photos']=$photos;
             $sections=Section::where('id','like',$this->getFlag())->get();
              $arr['post']=$post;
              $arr['sections']=$sections;
              return view('Admin.Post.update_view',$arr);
          }

       }else{

        return redirect()->back()->withErrors('you have no permission');
 
       }
      
   }
   
   public function delete(Request $request,$id){
      $user=Auth::user();
      $post=Post::find($id);

      // get the post section to apply the policy
      $section=$post->Section;

      if($user->can('control_post',$section)){

                if($request->isMethod('post')){
                 $post->delete();

                 return redirect(route('Post.Index'));
                }else{
                    $arr['post']=$post;

                    return view('Admin.Post.Delete_view',$arr);
                 }

      }else{

      }


   }

}
