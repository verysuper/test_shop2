<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')-test_shop2</title>
    <script src="/assets/js/jquery-2.2.4.min.js" defer></script>
    <script src="/assets/js/bootstrap.min.js" defer></script>
    <script src="/assets/js/js.cookie.js" defer></script>
    <script src="/assets/js/shop-laravel.js" defer></script>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/shop_laravel.css">
</head>
<body>
    <header>
        <ul class="nav">
            @if(session()->has('user_id'))
                <li><a href="/user/auth/sign-out">登出</a></li>
                <li><a href="/merchandise/create">新增商品</a></li>
                <li><a href="/merchandise/manage">管理商品</a></li>
            @else
                <li><a href="/user/auth/sign-in">登入</a></li>
                <li><a href="/user/auth/sign-up">註冊</a></li>
            @endif
        </ul>

    </header>
    <div class="container">
        @include('components.errors')
        @yield('content')
    </div>
    <footer>
        <a href="#">聯絡我們</a>
    </footer>
</body>
</html>
