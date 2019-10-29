@extends('layouts.web_app')

@section('title')
  Contact Us
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

 .comment-text{
  border:  #a7a7a7  1px solid !important;
  border-radius:20px !important;
  text-indent: 15px;
  }
  .comment-text:focus{
  border: #0085a1  1px solid !important;
  border-radius:20px;
  padding:10px;
 }

   
  </style>
 @endsection
@section('heading')
   Contact Us

 @endsection

@section('headerImage')
  {{url('/images/home.jpg')}}
 @endsection


@section('content')
 <div>
   <form   method="post">
            {{csrf_field()}}
     <div class="control-group">
              <div class=" form-group  ">
                        <label>Name :</label>
                        <input type="text" name="sender-name" class="inputText  form-control" placeholder="Name"  >

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
              <div class="form-group floating-label-form-group controls ">
                        <label>Message :</label>
                        <textarea rows="5" name="content" class="form-control comment-text" placeholder="Content"  > </textarea>
                        <p class="help-block text-danger"></p>
              </div>

        </div>
        
        <div class="form-group">
                <label> Select Group or User </label>
                 <select name="to"   >
                     <option value="admin"> Admin Group </option>
                     <option value="editor"> Editor Group </option>
                     <option value="all"> Admin & Editor Group </option>

                      @foreach( $users as $user)
                      <option value="{{$user->id}}" > {{$user->name}} </option>
                     @endforeach                               
        </div>
         
              
                         <input type="hidden" name="name" class="inputText  form-control"  style >
               
         

        <br>  <br>
         <div class="form-group">
              <button type="submit" class="btn btn-primary" style="border-radius:10px"   >Send</button>
            </div>
    </form>
 </div>
    

  @endsection