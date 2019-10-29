@extends('layouts.web_app')

@section('title')
  Login Page
 @endsection

@section('head')
  <style>
    .inputText{
  border:  #a7a7a7  1px solid !important;
  border-radius:20px !important;
  text-indent: 15px !important;
  }
 .inputText:focus{
  border: #0085a1  1px solid !important;
  border-radius:20px !important;
  padding:10px !important;
 }

   
  </style>
 @endsection
@section('heading')
  Login
 @endsection

@section('headerImage')
  {{url('/images/home.jpg')}}
 @endsection


@section('content')
 <div>
   <form method="POST" action="{{ route('login') }}">
            {{csrf_field()}}
      
        <div class="control-group">
              <div class="form-group  ">
                        <label>Email :</label>
                        <input type="email" name="email" class="inputText  form-control  @error('email') is-invalid @enderror" placeholder="Email Address"  >
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{  $message}}</strong>
                                    </span>
                                @enderror
               </div>
              
        </div>


        <div class="control-group">
              <div class="form-group  ">
                        <label>password :</label>
                        <input type="password" name="password" class="inputText  form-control @error('password') is-invalid @enderror" placeholder="Password"  >
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{  $message}}</strong>
                                    </span>
                                @enderror
               </div>
        </div>


        <div class="form-group">
              <button type="submit" class="btn btn-primary" style="border-radius:10px"   >Login</button>
            </div>
    </form>
 </div>
    

  @endsection