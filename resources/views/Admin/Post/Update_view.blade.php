@extends('layouts.Admin_app')

@section('title')
  Update Post
 @endsection

 @section('content')
 
  <!-- /.col-lg-4 -->
  <div class="col-lg-6">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           Post Info
                        </div>
                        <div class="panel-body">
                          <form method="post">
                          {{csrf_field()}}
                             <div class="form-group">
                                <label> Title : </label>
                                <input type='text' name='title' class='form-control'   value='{{$post->title}}' >
                              </div>
                              <div class="form-group">
                               <label>Content :</label>
                               <textarea name="content" placeholder="content"  class="form-control ckeditor">{!!$post->content!!} </textarea>
                               </div> 

                              <div class="form-group">
                                <label> Section :</label>
                                 <select name="section_id" class="js-example-basic-single form-control">
                                   @foreach( $sections as $section)
                                    <option {{$section->id==$post->section_id?'selected="selected"':''}}  value="{{$section->id}}" > {{$section->name}} </option>
                                   @endforeach
                                  
                              </div>
                        </div>
                        <div class="panel-footer">
                          <input type="submit" class="btn btn-primary" value="save">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                              Post Info
                            </div>
                            <div class="panel-body">
                               
                                <div class="row">
                                 
                                      @foreach($photos as $photo)
                                      <div class="col-md-4">
                                          <img src="{{url('/images/'.$photo->path)}}" style="width:100%;">
                                          <input type="checkbox"{{$post->Photos()->where('photo_id',$photo->id)->count()==1?'checked':''}} name="photos[]" value="{{$photo->id}}" >
                                          </div> 
                                       @endforeach
                                   
                                </div>
                            </div>
                          
                        </div>
                    </div>


                <script>
                    $(document).ready(function() {
                              $('.js-example-basic-single').select2();
                          });</script>
               </form>
                <!-- /.col-lg-4 -->

  @endsection