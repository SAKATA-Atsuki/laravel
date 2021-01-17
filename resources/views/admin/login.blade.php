<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログインフォーム</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id="admin">
    <div class="admin-login-header">
        <p class="blank-top-list"></p>
    </div>
    <div class="admin-login-main">
        <p class="admin-login-main-top">管理画面</p>
        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="admin-login-main-bottom">
                <span>ログインID</span>
                <input type="text" name="email" size="50" maxlength="255" value="{{ old('email') }}">
            </div>
            <div class="admin-login-main-bottom">
                <span>パスワード</span>
                <input type="password" name="password" size="50" maxlength="255" value="">
            </div>
            @if (count($errors) > 0)
                <p class="error">※IDもしくはパスワードが間違っています</p>
            @endif
            <div class="button"><input type="submit" value="ログイン" class="admin-login-button"></div>
        </form>
    </div>
    <div class="admin-login-footer">
        <p class="blank-top-list"></p>
    </div>
</body>
</html>