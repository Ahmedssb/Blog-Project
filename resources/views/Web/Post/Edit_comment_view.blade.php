@extends('layouts.web_app')

@section('title')
{{$post->title}}
@endsection

@section('head')
 <style>
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

  
 .control{
   font-size:12px;
 }

 .comment .footer{
   font-size:12px;
   color:gray;
   margin-left:auto:
   margin-right:0px;
 }
 </style>

 @endsection

@section('heading')
  {{$post->title}}
  @endsection


@section('headerImage')
  {{count($post->Photos)>0?url('/images/'.$post->Photos[0]->path):url('/images/home.jpg')}}
 @endsection


 @section('content')
     
      
  
    @auth
    <div class="container">
      <div class="row">
        <div class="col-md-12  ">
          
          <form  method="post" action="">
                  {{csrf_field()}}
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Message</label>
                <textarea rows="5" name="comment" class="form-control comment-text" placeholder="Comment" id="message" required data-validation-required-message="Please enter a message.">{{$comment->content}}</textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" style="border-radius:10px"  id="sendMessageButton">Edit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

   
   @endauth
@endsection