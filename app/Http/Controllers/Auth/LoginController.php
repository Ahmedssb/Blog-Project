<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    public function showLoginform(){
        return view('Web.Register&Login.Login_view');
    }

    public function logout(Request $request){
        $this->guard()->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request)?: redirect('/Main');

    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
      public function redirectPath(){
          $user=Auth::user();
          if($user->rule=='user'){
              return "/Main";
          }else{
            return "Admin/Main";

          }
      }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


  
}
