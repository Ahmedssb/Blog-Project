@extends('layouts.web_app')

@section('title')
  Main Page
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
  Welcom
 @endsection

@section('headerImage')
  {{url('/images/home.jpg')}}
 @endsection


@section('content')
 <div>
   <form action="{{ route('register') }}" method="post">
            {{csrf_field()}}
     <div class="control-group">
              <div class=" form-group  ">
                        <label>Name :</label>
                        <input type="text" name="name" class="inputText  form-control" placeholder="Name"  >
               </div>
        </div>


        <div class="control-group">
              <div class="form-group  ">
                        <label>Email :</label>
                        <input type="email" name="email" class="inputText  form-control" placeholder="Email Address"  >
               </div>
        </div>

        <div class="control-group">
              <div class="form-group  ">
                        <label>Phone :</label>
                        <input type="text" name="phone" class="inputText  form-control" placeholder="Phone Number"  >
               </div>
        </div>

        <div class="control-group">
              <div class="form-group  ">
                        <label>password :</label>
                        <input type="password" name="password" class="inputText  form-control" placeholder="Password"  >
               </div>
        </div>

        <div class="control-group">
              <div class="form-group  ">
                        <label>Confirm password :</label>
                        <input type="password" name="password_confirmation" class="form-control inputText" placeholder="Password"  >
               </div>
        </div>

        <div class="form-group">
              <button type="submit" class="btn btn-primary" style="border-radius:10px"   >Register</button>
            </div>
    </form>
 </div>
    

  @endsection