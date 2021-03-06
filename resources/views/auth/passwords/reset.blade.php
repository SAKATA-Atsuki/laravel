<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>パスワード再設定</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div id="email-head"></div>
    <div id="email-content">
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="password-reset-1">
                <span>パスワード</span>
                <input type="password" name="password" size="58" maxlength="255" value="">
            </div>
            @error('password')
                <p class="email-error">{{ $message }}</p>
            @enderror
            <div class="password-reset-2">
                <span>パスワード確認</span>
                <input type="password" name="password_confirmation" size="58" maxlength="255" value="">
            </div>
            @error('password_confirmation')
                <p class="email-error">{{ $message }}</p>
            @enderror
            <input type="submit" value="パスワードリセット" class="button-reset">
            <br>
            <a href="{{ route('top') }}" class="button-email-2">トップに戻る</a>    
        </form>
    </div>
</body>
</html>