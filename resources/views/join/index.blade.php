<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>会員登録フォーム</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id="body-join">
    <div id="head">
        <p>会員情報登録</p>
    </div>
    <div id="content">
        <form action="join" method="POST">
            @csrf
            <div>
                <span>氏名</span>
                <span class="name_sei">姓</span>
                <input type="text" name="name_sei" size="18" maxlength="255" value="{{ old('name_sei') }}">
                <span class="name_mei">名</span>
                <input type="text" name="name_mei" size="18" maxlength="255" value="{{ old('name_mei') }}">
            </div>
            @error('name_sei')
                <p class="error">{{ $message }}</p>
            @enderror
            @error('name_mei')
                <p class="error">{{ $message }}</p>
            @enderror
            <p>ニックネーム
                <input type="text" name="nickname" size="36" maxlength="255" value="{{ old('nickname') }}" class="nickname">
            </p>
            @error('nickname')
                <p class="error">{{ $message }}</p>
            @enderror
            <div class="gender">
                <span class="gender_gender">性別</span>
                <input type="radio" name="gender" value="1" @if (old('gender') === "1") checked @endif>男性
                <input type="radio" name="gender" value="2" @if (old('gender') === "2") checked @endif>女性
            </div>
            @error('gender')
                <p class="error">{{ $message }}</p>
            @enderror
            <p>パスワード
                <input type="password" name="password1" size="36" maxlength="255" value="{{ old('password1') }}" class="password1">
            </p>
            @error('password1')
                <p class="error">{{ $message }}</p>
            @enderror
            <p>パスワード確認
                <input type="password" name="password2" size="36" maxlength="255" value="{{ old('password2') }}" class="password2">
            </p>
            @error('password2')
                <p class="error">{{ $message }}</p>
            @enderror
            <p>メールアドレス
                <input type="text" name="email" size="36" maxlength="255" value="{{ old('email') }}" class="email">
            </p>
            @error('email')
                <p class="error">{!! nl2br(e($message)) !!}</p>
            @enderror
            <input type="submit" value="確認画面へ" class="button-index-1">
        </form>
    </div>
</body>
</html>