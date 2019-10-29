<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
 

class Profile_cont extends Controller
{
    public function update(Request $request){
        $user=Auth::user();
         if($request->isMethod('post')){
                    // uese fun check to verify that the input password match the one stored on the database 
                    if($this->check($request->input('c-password'))){
                        $user->update([
                            'name'=>$request->input('name'),
                            'phone'=>$request->input('phone'),
                        ]);

                                //code for updating user password 
                                if(!is_null($request->input('n-password'))  and ($request->input('n-password')== $request->input('password-confirm')) ){
                                        $user->password=Hash::make($request->input("n-password"));
                                        $user->update();
                                    } 
                                    
                      return redirect()->back();

                    }else{
                        dd('errorrr');
                    }

        }else{
            $arr['user']=$user;
            return view('Web.Register&Login.Profile_view',$arr);
        }

    }

    protected function check($password){
        /*hash check fun is sed to verify 
        that the user enter password that match the one stored on the database */
      if(Hash::check($password,Auth::user()->getAuthPassword())){
         return true;
      }

      return false;
    }
}
