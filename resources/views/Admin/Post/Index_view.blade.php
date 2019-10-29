@extends('layouts.Admin_app')

@section('title')
  Posts
 @endsection

 @section('content')
 <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            All Posts
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <a href="{{route('Post.Add')}}" style="margin-bottom:10px" class="btn btn-primary">Add Post</a>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Section</th>
                                        <th>Posted By</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                         
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr class="odd gradeX">
                                        <td>{{$post->title }}</td>
                                        <td>{{$post->Section->name}}</td>
                                        <td>{{$post->User->name}}</td>
                                        <td>{{$post->created_at}}</td>
                                        <td>
                                        <a class="btn btn-danger" href="{{route('Post.Delete',['id'=>$post->id])}}">Delete</a>
                                        <a class="btn btn-warning" href="{{route('Post.Update',['id'=>$post->id])}}">Update</a>
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