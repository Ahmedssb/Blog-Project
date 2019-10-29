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

 .comment{
   border:#0085a1  1px solid ;
   border-radius:20px;
    width:100%;
    padding:10px 0px;
    word-wrap:break-word;
    margin-bottom:5px;
 }

 .comment .user-name{
   width:100px;
   height:50px;
   background-color:#0085a1;
   color:#fff;
   border-radius:25px;
   display:flex;
   justify-content:center;
   align-items:center;
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
     
<article>
      <div class="container">
        <div class="row">
          <div class="col-md-12 mx-auto">
             {!!$post->content!!}
             <div class="row">
             @foreach($post->Photos as $photo)
               
                <div class="col-md-4">
                <img src={{url('/images/'.$photo->path)}} style="width:150px; height:150px;">
                 </div>

            @endforeach 
            </div>

          </div>
        </div>
      </div>
    </article>
  
    @auth
    <div class="container">
      <div class="row">
        <div class="col-md-12  ">
          
          <form  method="post" action="">
                  {{csrf_field()}}
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Message</label>
                <textarea rows="5" name="comment" class="form-control comment-text" placeholder="Comment" id="message" required data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" style="border-radius:10px"  id="sendMessageButton">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>

   <div class="row">
     <div class="col-md-12">
     @foreach($comments as $comment)

     <div class="row comment">
      <div class="col-md-2">
          <div class="user-name">
              <label> {{$comment->User->name}}</label>
          </div>

        </div>
      <div class="col-md-8">
   <!-- a new line stored on the datbase as \n  we need to replace it with <br> to get a new line -->
      {!! str_replace(array("\n"),'<br>',$comment->content) !!}

        </div>
      @if($comment->User->id==Auth::user()->id or Auth::user()->rule=="admin" or Auth::user()->id==$post->Section->admin_id)
       <div class="col-md-2">
            <div class="control"> 
                <a href="{{route('Web.Comment.Edit',['id'=>$comment->id])}}">Edit </a>|
                <a href=#  onclick="deleteComment('{{route('Web.Comment.Delete',['id'=>$comment->id])}}')"> Delete</a>
            </div>
       </div>
       @endif

       <div class="footer">
           {{$comment->created_at}}
        </div>
      </div>
      @endforeach
     </div> 
   <script>
     function deleteComment($url){
          var flag=confirm('are you sure you want to dlete this comment?');

          if(flag){
            window.location.href=$url;
          }
     }
   </script>
   </div>
   @endauth
@endsection