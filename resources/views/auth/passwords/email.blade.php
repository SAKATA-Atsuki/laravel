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
        
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <p class="email-message">パスワード再設定用の URL を記載したメールを送信します。<br>
                ご登録されたメールアドレスを入力してください。</p>
            <div class="email-email">
                <span>メールアドレス</span>
                <input type="text" name="email" size="59" maxlength="255" value="{{ old('email') }}">
            </div>
            @error('email')
                <p class="email-error">{{ $message }}</p>
            @enderror
            <input type="submit" value="送信する" class="button-email-1">
            <br>
            <a href="{{ route('top') }}" class="button-email-2">トップに戻る</a>    
        </form>
    </div>
</body>
</html>