<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>メールアドレス変更認証</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <p class="mypage-edit-auth-title">メールアドレス変更　認証コード入力</p>
    <div class="mypage-edit-auth-content">
        <p>（※ メールアドレスの変更はまだ完了していません）<br>
            変更後のメールアドレスにお送りしましたメールに記載されている「認証コード」を入力してください。</p>
        <div>
            <span>　認証コード　　</span>
            <input type="text" name="code" size="40">
        </div>
        <form action="{{ route('mypage.edit.email.store') }}" method="POST">
            @csrf
            <div class="mypage-edit-auth-button">
                <input type="submit" value="認証コードを送信してメールアドレスの変更を完了する" class="mypage-edit-auth-button-1">
            </div>    
        </form>
    </div>
</body>
</html>