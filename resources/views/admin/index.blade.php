<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理画面トップ</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id="admin">
    <div class="admin-index-header">
        <span class="admin-title">管理画面メインメニュー</span>
        <div>
            <span class="admin-welcome">ようこそ{{ Auth::guard('administer')->user()->name_sei . Auth::guard('administer')->user()->name_mei }}さん</span>
            <a href="{{ route('admin.logout') }}" class="admin-index-header-button">ログアウト</a>
        </div>
    </div>
    <div class="admin-index-main">
        <a href="{{ route('admin.member') }}" class="admin-index-main-member">会員一覧</a>
        <p>　</p>
        <a href="{{ route('admin.category') }}" class="admin-index-main-category">商品カテゴリ一覧</a>
    </div>
</body>
</html>