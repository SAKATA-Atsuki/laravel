<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>パスワード変更</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <p class="mypage-edit-password-title">パスワード変更</p>
    <form action="{{ route('mypage.edit.password.store') }}" method="POST">
        @csrf
        <div class="mypage-edit-password-content">
            <div class="mypage-edit-password-content-left">
                <span>パスワード</span>
            </div>
            <div>
                <input type="password" name="password1" size="36">
            </div>
        </div>
        <div class="mypage-edit-password-content">
            @error('password1')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <br>
        <div class="mypage-edit-password-content">
            <div class="mypage-edit-password-content-left">
                <span>パスワード確認</span>
            </div>
            <div>
                <input type="password" name="password2" size="36">
            </div>
        </div>
        <div class="mypage-edit-password-content">
            @error('password2')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mypage-edit-password-button">
            <input type="submit" value="パスワードを変更" class="mypage-edit-password-button-1">
            <br><br>
            <a href="{{ route('mypage') }}" class="mypage-edit-password-button-2">マイページに戻る</a>    
        </div>
    </form>
</body>
</html>