@extends('layouts.Admin_app')

@section('title')
 Users
 @endsection

 @section('content')
 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Users
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <a href="{{route('User.Add')}}" style="margin-bottom:10px" class="btn btn-primary">Add User</a>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Role</th>
                                        <th>Action</th>

                                         
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr class="odd gradeX">
                                        <td>{{$user->name }}</td>
                                        <td> {{$user->email }}</td>
                                        <td> {{$user->rule }}</td>
                                        <td>
                                        <a class="btn btn-danger" href="{{route('User.Delete',['id'=>$user->id])}}">Delete</a>
                                        <a class="btn btn-warning" href="{{route('User.Update',['id'=>$user->id])}}">Update</a>
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
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->

  @endsection