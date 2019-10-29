@extends('layouts.Admin_app')

@section('title')
  Update section
 @endsection

 @section('content')
 
  <!-- /.col-lg-4 -->
  <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           Section Info
                        </div>
                        <div class="panel-body">
                          <form method="post">
                             {{csrf_field()}}
                             <div class="form-group">
                                <label> Name : </label>
                                <input type='text' name='name' class='form-control' placeholder="SectionName"  value="{{$section->name}}">
                              </div>
                               
                              <div class="form-group">
                                <label> Editor for Section </label>
                                 <select name="admin_id" class="form-control js-example-basic-single">
                                   <option value=""> empty </option>

                                   @foreach( $users as $user)
                                    <option value="{{$user->id}}" > {{$user->name}} </option>
                                   @endforeach

                                   @if(!is_null($section->Admin))
                                   <option selected="selected" value="{{$section->Admin->id}}" > {{$section->Admin->name}} </option>
                                   @endif
                              </div>
                        </div>
                        <div class="panel-footer">
                          <input type="submit" class="btn btn-primary" value="save">
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