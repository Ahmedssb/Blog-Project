@extends('layouts.Admin_app')

@section('title')
   Images
 @endsection

 @section('content')
 <div class="col-lg-12">
 <a href="{{route('Image.Add')}}" style="margin-bottom:10px" class="btn btn-primary">Add Image</a>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           Images
                        </div>
                        <!-- /.panel-heading -->

                        <div class="panel-body">

                          @foreach($photos as $photo)
                           <a href="{{route('Image.Delete',['id'=>$photo->id])}}"> <img src="{{url('/images/'.$photo->path)}}"  style="width:100px; height:100px"></a>

                            @endforeach
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->

  @endsection