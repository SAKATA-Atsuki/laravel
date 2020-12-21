<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>メールアドレス変更</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <p class="mypage-edit-email-title">メールアドレス変更</p>
    <form action="{{ route('mypage.edit.email.auth') }}" method="POST">
        @csrf
        <div class="mypage-edit-email-content">
            <div class="mypage-edit-email-content-left">
                <span>現在のメールアドレス</span>
            </div>
            <div>
                <span>{{ Auth::user()->email }}</span>
            </div>
        </div>
        <br>
        <div class="mypage-edit-email-content">
            <div class="mypage-edit-email-content-left">
                <span>変更後のメールアドレス</span>
            </div>
            <div>
                <input type="text" name="email" size="36">
            </div>
        </div>
        <div class="mypage-edit-email-content">
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mypage-edit-email-button">
            <input type="submit" value="認証メール送信" class="mypage-edit-email-button-1">
            <br><br>
            <a href="{{ route('mypage') }}" class="mypage-edit-email-button-2">マイページに戻る</a>    
        </div>
    </form>
</body>
</html>