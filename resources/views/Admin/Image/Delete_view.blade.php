@extends('layouts.Admin_app')

@section('title')
  Delete Image
 @endsection

 @section('content')
   
   
  <!-- /.col-lg-4 -->
  <div class="col-lg-4">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                          Delete
                        </div>
                        <div class="panel-body">
                        <form method="post">
                             {{csrf_field()}}
                          <label>are you sure </label>
                          <img src="{{url('/images/'.$photo->path)}}" style="width:100px; height:100px">
                        </div>
                        <div class="panel-footer">
                          <input type="submit" class="btn btn-danger" value="delete">
                        </div>
                    </div>
                </div>
                </form>
                <!-- /.col-lg-4 -->

  @endsection