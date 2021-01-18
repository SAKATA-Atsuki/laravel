<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>会員詳細画面</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id="admin">
    <div class="admin-index-header">
        <span class="admin-title">会員詳細</span>
        <div><a href="{{ route('admin.member') }}" class="admin-register-header-button">一覧へ戻る</a></div>
    </div>
    <div id="admin-register">
        <div class="flex">
            <p class="width-left-join">ID</p>
            <p class="width-right-join">{{ $member->id }}</p>
        </div>
        <div class="flex">
            <p class="width-left-join">氏名</p>
            <p class="width-right-join">{{ $member->name_sei }}　{{ $member->name_mei }}</p>
        </div>
        <div class="flex">
            <p class="width-left-join">ニックネーム</p>
            <p class="width-right-join">{{ $member->nickname }}</p>
        </div>
        <div class="flex">
            <p class="width-left-join">性別</p>
            <p class="width-right-join">
                @foreach (config('master.gender') as $index => $value)
                    @if ($member->gender == $index) {{ $value }} @endif
                @endforeach
            </p>
        </div>
        <div class="flex">
            <p class="width-left-join">パスワード</p>
            <p class="width-right-join">セキュリティのため非表示</p>
        </div>
        <div class="flex">
            <p class="width-left-join">メールアドレス</p>
            <p class="width-right-join">{{ $member->email }}</p>
        </div>
        <div class="admin-member-detail-button">
            <a href="{{ route('admin.member.edit', ['id' => $member->id]) }}" class="admin-member-detail-button-left">編集</a>
            <a href="{{ route('admin.member.detail.delete', ['id' => $member->id]) }}" class="admin-member-detail-button-right">削除</a>
        </div>
    </div>
</body>
</html>