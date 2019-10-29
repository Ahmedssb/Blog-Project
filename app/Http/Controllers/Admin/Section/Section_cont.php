<?php

namespace App\Http\Controllers\Admin\Section;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use  App\Model\Section;
class Section_cont extends Controller
{
    public function add(Request $request){
        if($request->isMethod('post')){

            $section=Section::create($request->all());
               // change the role of user into editor ;
            if (!is_null($request->input('admin_id'))){
                  $user=User::find($request->input('admin_id'));
                  $user->rule="editor";
                  $user->update();    
            } 

            return redirect()->back()->with('msg','Section Added Successfully');

        }else{
               $users=User::select('id','name')->where('rule','user')->get();
                $arr['users']=$users;       
               return view('Admin.Section.Add_view',$arr);
         }
       
    }// end of fun add 

    public function update(Request $request,$id){
        $section=Section::find($id);

        if($request->isMethod('post')){

               $section->name=$request->input('name');
               // if the editor of the section change then change the old admin rule into user  
               if(is_null($request->input('admin_id')) or $section->admin_id!=$request->input('admin_id')  ){
                  
                     if(!is_null($section->admin_id)){
                           $old_admin=User::find($section->admin_id);
                           $old_admin->rule='user';
                           $old_admin->update();
                           $section->admin_id=$request->input('admin_id');
                     }
                     
                     // update the rule of the selected user into editor 
                     if(!is_null($request->input('admin_id'))){
                           $admin=User::find($request->input('admin_id'));
                           $admin->rule="editor";
                           $admin->update();
                     }

               }
                  $section->update();
                  return redirect()->back()->with('msg','Section Updated Successfully');
         }else{
          
               $users=User::select('id','name')->where('rule','user')->get();
               //dd($user);
            $arr['users']=$users;
            $arr['section']=$section;         
               return view('Admin.Section.Update_view',$arr);
         }
 
    }

    public function index(){
       $sections=Section::select('id','name','admin_id')->get();
       $arr['sections']=$sections;
       return view('Admin.Section.Index_view',$arr);
   }

   public function delete(Request $request, $id){
      $section=Section::find($id);
      if($request->isMethod('post')){
            $section->delete();
         return  redirect(route('Section.Index'))->with('msg','Section Deleted Successfully');
      }else{
         $arr['section']=$section;
         return view('Admin.Section.Delete_view',$arr);
      }
   }
}
