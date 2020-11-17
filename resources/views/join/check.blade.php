<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>会員情報確認画面</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id="body-join">
    <div id="head">
        <p>会員情報確認画面</p>
    </div>
    <div id="content">
        <div class="flex">
            <p class="width-left-join">氏名</p>
            <p class="width-right-join">{{ $session_join['name_sei'] }}　{{ $session_join['name_mei'] }}</p>
        </div>
        <div class="flex">
            <p class="width-left-join">ニックネーム</p>
            <p class="width-right-join">{{ $session_join['nickname'] }}</p>
        </div>
        <div class="flex">
            <p class="width-left-join">性別</p>
            <p class="width-right-join">
                @foreach (config('master.gender') as $index => $value)
                    @if ($session_join['gender'] == $index) {{ $value }} @endif
                @endforeach
            </p>
        </div>
        <div class="flex">
            <p class="width-left-join">パスワード</p>
            <p class="width-right-join">セキュリティのため非表示</p>
        </div>
        <div class="flex">
            <p class="width-left-join">メールアドレス</p>
            <p class="width-right-join">{{ $session_join['email'] }}</p>
        </div>
        <form action="{{ route('join.store') }}" method="POST">
            @csrf
            <input type="hidden" name="action" value="submit">
            <input type="submit" value="登録完了" class="button-check-1">
            <br>
            <a href="../join?action=rewrite" class="button-check-2">前に戻る</a>
        </form>
    </div>
</body>
</html>