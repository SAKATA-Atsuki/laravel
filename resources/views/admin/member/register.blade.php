<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>会員登録ページ</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id="admin">
    <div class="admin-index-header">
        <span class="admin-title">会員登録</span>
        <div><a href="{{ route('admin.member') }}" class="admin-register-header-button">一覧へ戻る</a></div>
    </div>
    <div id="admin-register">
        <form action="{{ route('admin.member.register') }}" method="POST">
            @csrf
            <div class="admin-register-id">
                <span>ID</span>
                <span class="admin-register-id-right">登録後に自動採番</span>
            </div>
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
                @foreach (config('master.gender') as $index => $value)
                    <input type="radio" name="gender" value="{{ $index }}" @if (old('gender') == $index) checked @endif>{{ $value }}
                @endforeach
            </div>
            @error('gender')
                <p class="error">{{ $message }}</p>
            @enderror
            <p>パスワード
                <input type="password" name="password1" size="36" maxlength="255" value="" class="password1">
            </p>
            @error('password1')
                <p class="error">{{ $message }}</p>
            @enderror
            <p>パスワード確認
                <input type="password" name="password2" size="36" maxlength="255" value="" class="password2">
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
            <div class="admin-register-button">
                <input type="submit" value="確認画面へ" class="button-admin-register">
            </div>
        </form>
    </div>
</body>
</html>