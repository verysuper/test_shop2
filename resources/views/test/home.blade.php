@extends('test.master')
@section('title',$title)

@section('content')
<h1>{{$title}}</h1>
@include('components.test')
@endsection
