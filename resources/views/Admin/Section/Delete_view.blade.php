@extends('layouts.Admin_app')

@section('title')
  Delete
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
                          <span style="color:#761c19">{{$section->name}}</span>
                        </div>
                        <div class="panel-footer">
                          <input type="submit" class="btn btn-danger" value="delete">
                        </div>
                    </div>
                </div>
                </form>
                <!-- /.col-lg-4 -->

  @endsection