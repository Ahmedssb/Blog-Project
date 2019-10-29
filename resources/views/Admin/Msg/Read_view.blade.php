@extends('layouts.Admin_app')

@section('title')
 Read massages
 @endsection

 @section('content')
 
  <!-- /.col-lg-4 -->
  <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="form-group">
                                    <div class="pull-left">
                                    {{$msg->data['name']}}  || {{$msg->data['email']}}
                                    </div>

                                    <div class="pull-right">
                                    {{$msg->data['phone']}}   
                                    </div>
                            </div>
                        </div>

                        <div class="panel-body">
                          {!! str_replace(array("\n"),"<br>",$msg->data['content']) !!}
                        <div class="panel-footer">
                          <a   class="btn btn-primary" href="{{route('Msg.Index',['type'=>'All'])}}" >Back</a>
                        </div>
                    </div>
                </div>
                 <!-- /.col-lg-4 -->

  @endsection