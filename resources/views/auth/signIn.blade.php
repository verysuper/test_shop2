@extends('layout.master')
@section('title',$title)
@section('content')
<h1>{{$title}}</h1>
<form action="/user/auth/sign-in" method="post">
    {{ csrf_field() }}
    Email:
    <input type="text" name="email" value="{{old('email')}}" placeholder="Email">
    <p></p>
    密碼:
    <input type="password" name="password" value="" placeholder="密碼">
    <p></p>
    <p></p>
    <button type="submit">登入</button>
</form>
@endsection
