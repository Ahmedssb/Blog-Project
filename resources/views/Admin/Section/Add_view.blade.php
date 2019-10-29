@extends('layouts.Admin_app')

@section('title')
  Add section
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
                                <input type='text' name='name' class='form-control' placeholder="SectionName">
                              </div>
                               
                              <div class="form-group">
                                 <label> Editor for Section </label>
                                 <select name="admin_id" class="form-control js-example-basic-single">
                                   <option value=""> empty </option>
                                   @foreach( $users as $user)
                                    <option value="{{$user->id}}" > {{$user->name}} </option>
                                   @endforeach
                                  
                              </div>
                              
                        </div>
						
                        <div class="panel-footer">
                            <input type="submit" class="btn btn-primary" value="save">
                        </div>
						
            </div>
    </div>
    </form>     
     <script>
                $(document).ready(function() {
                          $('.js-example-basic-single').select2();
                      });</script>
              
                <!-- /.col-lg-4 -->

  @endsection