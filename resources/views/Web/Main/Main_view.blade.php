@extends('layouts/Web_app')

@section('title')
  Main Page
 @endsection

@section('head')
  <style>
   .panel{
       border: #868686 1px solid ;
       margin:10px;
       padding:10px;
       border-radius:15px;
       Text-align:center;
   }

   .panel:hover{
     background-color:#868686;
    color:#fff;
   }
   
  </style>
 @endsection
@section('heading')
  Welcom
 @endsection

@section('headerImage')
  {{url('/images/home.jpg')}}
 @endsection


@section('content')
 <div class="row">
 @foreach($sections as $sectio)
    <div calss="col-md-4">
    <a href="{{route('Web.Section.Index',['id'=>$sectio->id])}}">
      <div class="panel">
      <label>{{$sectio->name}}</label>
      </div>
    </a>
    </div>
    @endforeach
  </div>
 @endsection
