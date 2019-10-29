<?php

namespace App\Http\Controllers\Admin\Image;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Model\Photo;
class Image_cont extends Controller
{
    public function add(Request $request){
        if($request->isMethod('post')){

                $photo=$request->file('photo');
                    
                /**first arg is the path where image will be saves 2nd arg is 
                 the name of the iamge  3d arg is the name of the disk */
                $path= $photo->storeAs('post',$photo->getClientOriginalName(),'images');
                Photo::create([
                    'path'=> $path
                ]);
                return redirect()->back()->with('msg','Image Added Successfully');

        }else{
            return view('Admin.Image.AddImage_view');
        }

    }

  public function index(){
      // retrive all photos
      $photos=Photo::all();
      $arr['photos']=$photos;
      //dd($arr);
      return view('Admin.Image.index_view',$arr);
  }

  public function delete(Request $request,$id){
      $photo=Photo::find($id);

      if($request->isMethod('post')){

            try{
                    unlink(public_path('/images/'.$photo->path));
                    $photo->delete();
                    
            }catch(\Exception $exception){

            }
            return redirect(route('Image.Index'))->with('msg','Image Deleted Successfully');
       
      }else{

            $arr['photo']=$photo;
            return view('Admin.Image.Delete_view',$arr);
      }

  }
}
