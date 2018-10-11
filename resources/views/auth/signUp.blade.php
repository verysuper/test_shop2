@extends('layout.master')
@section('title',$title)
@section('content')
<h1>{{$title}}</h1>
<form action="/user/auth/sign-up" method="post">
    {{ csrf_field() }}
    暱稱:
    <input type="text" name="nickname" value="{{old('nickname')}}" placeholder="暱稱">
    <p></p>
    Email:
    <input type="text" name="email" value="{{old('email')}}" placeholder="Email">
    <p></p>
    密碼:
    <input type="password" name="password" value="" placeholder="密碼">
    <p></p>
    確認密碼:
    <input type="password" name="password_confirmation" value="" placeholder="確認密碼">
    <p></p>
    <select name="type" id="">
        <option value="G">一般會員</option>
        <option value="A">管理者</option>
    </select>
    <p></p>
    <button type="submit">註冊</button>
</form>
@endsection
