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
        <form action="{{ route('join') }}" method="POST">
            @csrf
            <div>
                <span>氏名</span>
                <span class="name_sei">姓</span>
                <input type="text" name="name_sei" size="18" maxlength="255" value="@if(isset($session_join)){{ $session_join['name_sei'] }}@else{{ old('name_sei') }}@endif">
                <span class="name_mei">名</span>
                <input type="text" name="name_mei" size="18" maxlength="255" value="@if(isset($session_join)){{ $session_join['name_mei'] }}@else{{ old('name_mei') }}@endif">
            </div>
            @error('name_sei')
                <p class="error">{{ $message }}</p>
            @enderror
            @error('name_mei')
                <p class="error">{{ $message }}</p>
            @enderror
            <p>ニックネーム
                <input type="text" name="nickname" size="36" maxlength="255" value="@if(isset($session_join)){{ $session_join['nickname'] }}@else{{ old('nickname') }}@endif" class="nickname">
            </p>
            @error('nickname')
                <p class="error">{{ $message }}</p>
            @enderror
            @php
                if (isset($session_join)) {
                    $gender = $session_join['gender'];
                } else {
                    $gender = old('gender');
                }
            @endphp
            <div class="gender">
                <span class="gender_gender">性別</span>
                @foreach (config('master.gender') as $index => $value)
                    <input type="radio" name="gender" value="{{ $index }}" @if ($gender == $index) checked @endif>{{ $value }}
                @endforeach
            </div>
            @error('gender')
                <p class="error">{{ $message }}</p>
            @enderror
            <p>パスワード
                <input type="password" name="password1" size="36" maxlength="255" value="@if(isset($session_join)){{ $session_join['password1'] }}@else{{ old('password1') }}@endif" class="password1">
            </p>
            @error('password1')
                <p class="error">{{ $message }}</p>
            @enderror
            <p>パスワード確認
                <input type="password" name="password2" size="36" maxlength="255" value="@if(isset($session_join)){{ $session_join['password2'] }}@else{{ old('password2') }}@endif" class="password2">
            </p>
            @error('password2')
                <p class="error">{{ $message }}</p>
            @enderror
            <p>メールアドレス
                <input type="text" name="email" size="36" maxlength="255" value="@if(isset($session_join)){{ $session_join['email'] }}@else{{ old('email') }}@endif" class="email">
            </p>
            @error('email')
                <p class="error">{!! nl2br(e($message)) !!}</p>
            @enderror
            <input type="submit" value="確認画面へ" class="button-index-1">
        </form>
    </div>
</body>
</html>