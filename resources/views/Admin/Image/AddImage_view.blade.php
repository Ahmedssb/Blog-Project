@extends('layouts.Admin_app')

@section('title')
    Uplaod Image
 @endsection

 @section('content')
 
  <!-- /.col-lg-4 -->
  <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           Image Info
                        </div>
                        <div class="panel-body">
                        
                        <form method="post"   enctype="multipart/form-data">
                             {{csrf_field()}}
                               
                              <div class="form-group">
                                <input class="btn btn-primary" name="photo" type="file"  value="Upload">
                                  
                                  
                              </div>
                        </div>
                        <div class="panel-footer">
                          <input type="submit" class="btn btn-primary" value="Upload">
                        </div>
                    </div>
                </div>
             </form>
                <!-- /.col-lg-4 -->

  @endsection