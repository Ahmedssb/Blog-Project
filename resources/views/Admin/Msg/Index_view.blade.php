@extends('layouts.Admin_app')

@section('title')
  Messages
 @endsection

 @section('content')
 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Massages
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <a href="{{route('Msg.Index',['type'=>'All'])}}" style="margin-bottom:10px" class="btn btn-primary">All</a>
                        <a href="{{route('Msg.Index',['type'=>'Read'])}}" style="margin-bottom:10px" class="btn btn-primary">Readed</a>
                        <a href="{{route('Msg.Index',['type'=>'UnRead'])}}" style="margin-bottom:10px" class="btn btn-primary">Un Readed   </a>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th> </th>
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Phone</th>
                                        <th>Read At</th>
                                        <th>Action</th>
                                     </tr>
                                </thead>
                                <tbody>
                                @foreach($msgs as $msg)
                                    <tr class="odd gradeX">
                                       <td> <i class="fa fa-envelope{{is_null($msg->read_at)?'':'-o'}}" > </i></td>
                                        <td>{{$msg->data['name'] }}</td>
                                        <td>{{ $msg->data['email']}}</td>
                                        <td>{{ $msg->data['phone']}}</td>
                                        <td>{{ $msg->read_at}}</td>
                                        <td>
                                        <form action="{{route('Msg.Delete',['id'=>$msg->id])}}" method="post" id="delete-form-{{$msg->id}}" >
                                          @csrf
                                        </form>
                                        <a class="btn btn-danger" href="{{route('Msg.Delete',['id'=>$msg->id])}}" onclick="deleteMsg('{{$msg->id}}')">Delete</a>
                                        <a class="btn btn-primary" href="{{route('Msg.Read',['id'=>$msg->id])}}">Read</a>
                                        </td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                           <!-- Page-Level Demo Scripts - Tables - Use for reference -->
                                <script>
                                $(document).ready(function() {
                                    $('#dataTables-example').DataTable({
                                        responsive: true
                                    });
                                });
                                </script> 
                               <script>
                                 function deleteMsg($id){
                                    event.preventDefault();
                                    var $flag=confirm("Are you sure?");

                                    if($flag){
                                        document.getElementById('delete-form-'+$id).submit();
                                    } 
                                 }
                               </script>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->

  @endsection
 