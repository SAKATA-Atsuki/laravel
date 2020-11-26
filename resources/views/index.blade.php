<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>トップページ</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @if (Auth::check())
        <div id="top-head-2">
            <span class="welcome">ようこそ{{ Auth::user()->name_sei }}　{{ Auth::user()->name_mei }}様</span>
            <div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" class="button-top-right-2" value="ログアウト">
                </form>
            </div>
        </div>
        {{-- <div id="top-bottom">
            <a href="{{ route('top.leave') }}" class="button-top-bottom">退会</a>
        </div> --}}
    @else
        <div id="top-head-1">
            <a href="{{ route('register') }}" class="button-top-center-1">新規会員登録</a>
            <a href="{{ route('login') }}" class="button-top-right-1">ログイン</a>
        </div>
    @endif
</body>
</html>