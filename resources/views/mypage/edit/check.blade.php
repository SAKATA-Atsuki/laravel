<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>会員情報変更確認画面</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <p class="mypage-edit-check-title">会員情報変更確認画面</p>
    <div class="mypage-edit-check-content">
        <p class="mypage-edit-check-content-left">氏名</p>
        <p>{{ $data['name_sei'] }}　{{ $data['name_mei'] }}</p>
    </div>
    <div class="mypage-edit-check-content">
        <p class="mypage-edit-check-content-left">ニックネーム</p>
        <p>{{ $data['nickname'] }}</p>
    </div>
    <div class="mypage-edit-check-content">
        <p class="mypage-edit-check-content-left">性別</p>
        <p>
            @foreach (config('master.gender') as $index => $value)
                @if ($data['gender'] == $index) {{ $value }} @endif
            @endforeach
        </p>
    </div>
    <div class="mypage-edit-check-button">
        <form action="{{ route('mypage.edit.information.store') }}" method="POST">
            @csrf
            <input type="submit" value="変更完了" class="mypage-edit-check-button-1">
            <br><br>
            <input type="submit" value="前に戻る" name="back" class="mypage-edit-check-button-2">
        </form>
    </div>
</body>
</html>