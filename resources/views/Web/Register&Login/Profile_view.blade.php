@extends('layouts.web_app')

@section('title')
  Profile
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
  Profile
 @endsection

@section('headerImage')
  {{url('/images/home.jpg')}}
 @endsection


@section('content')
 <div>
   <form action="#" method="post">
            {{csrf_field()}}
     <div class="control-group">
              <div class=" form-group  ">
                        <label>Name :</label>
                        <input type="text" name="name" class="inputText  form-control" placeholder="Name" value="{{$user->name}}" >
               </div>
        </div>

 

        <div class="control-group">
              <div class="form-group  ">
                        <label>Phone :</label>
                        <input type="text" name="phone" class="inputText  form-control" placeholder="Phone Number" value="{{$user->phone}}" >
               </div>
        </div>

        <div class="control-group">
              <div class="form-group  ">
                        <label>Current password :</label>
                        <input type="password" name="c-password" class="inputText  form-control" placeholder="Current Password"  >
               </div>
        </div>

        <div class="control-group">
              <div class="form-group  ">
                        <label>New password :</label>
                        <input type="password" name="n-password" class="inputText  form-control" placeholder="New Password"  >
               </div>
        </div>

        <div class="control-group">
              <div class="form-group  ">
                        <label>Confirm password :</label>
                        <input type="password" name="password-confirm" class="form-control inputText" placeholder="ConfirmPassword"  >
               </div>
        </div>

        <div class="form-group">
              <button type="submit" class="btn btn-primary" style="border-radius:10px"   >Save</button>
            </div>
    </form>
 </div>
    

  @endsection