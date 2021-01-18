<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>会員編集確認画面</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id="admin">
    <div class="admin-index-header">
        <span class="admin-title">会員編集</span>
        <div><a href="{{ route('admin.member') }}" class="admin-register-header-button">一覧へ戻る</a></div>
    </div>
    <div id="admin-register">
        <div class="flex">
            <p class="width-left-join">ID</p>
            <p class="width-right-join">{{ $session_edit['id'] }}</p>
        </div>
        <div class="flex">
            <p class="width-left-join">氏名</p>
            <p class="width-right-join">{{ $session_edit['name_sei'] }}　{{ $session_edit['name_mei'] }}</p>
        </div>
        <div class="flex">
            <p class="width-left-join">ニックネーム</p>
            <p class="width-right-join">{{ $session_edit['nickname'] }}</p>
        </div>
        <div class="flex">
            <p class="width-left-join">性別</p>
            <p class="width-right-join">
                @foreach (config('master.gender') as $index => $value)
                    @if ($session_edit['gender'] == $index) {{ $value }} @endif
                @endforeach
            </p>
        </div>
        <div class="flex">
            <p class="width-left-join">パスワード</p>
            <p class="width-right-join">セキュリティのため非表示</p>
        </div>
        <div class="flex">
            <p class="width-left-join">メールアドレス</p>
            <p class="width-right-join">{{ $session_edit['email'] }}</p>
        </div>
        <form action="{{ route('admin.member.edit.store') }}" method="POST">
            @csrf
            <div class="admin-check-button">
                <input type="hidden" name="action" value="submit">
                <input type="submit" value="編集完了" class="button-admin-register">
            </div>
        </form>
    </div>
</body>
</html>