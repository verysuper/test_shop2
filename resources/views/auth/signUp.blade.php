@extends('layout.master')
@section('title',$title)
@section('content')
<h1>{{$title}}</h1>
<form action="/user/auth/sign-up" method="post">
    {{ csrf_field() }}
    <label for="">
        暱稱:
        <input type="text" name="nickname" id="" placeholder="暱稱">
    </label>
    <label for="">
        Email:
        <input type="text" name="email" id="" placeholder="Email">
    </label>
    <label for="">
        密碼:
        <input type="password" name="password" id="" placeholder="密碼">
    </label>
    <label for="">
        確認密碼:
        <input type="password" name="" id="" placeholder="確認密碼">
    </label>
    <label for="">
        <select name="type" id="">
            <option value="G">一般會員</option>
            <option value="A">管理者</option>
        </select>
    </label>
    <button type="submit">註冊</button>
</form>
@endsection
