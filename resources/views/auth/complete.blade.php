<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>会員登録完了</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id="body-join">
    <div id="head">
        <p class="complete-head">会員登録完了</p>
    </div>
    <div id="content">
        <p class="complete-content">会員登録が完了しました。</p>
        <a href="{{ route('register.login') }}" class="button-complete">トップに戻る</a>
    </div>
</body>
</html>