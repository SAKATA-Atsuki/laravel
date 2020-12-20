<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>マイページ</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div id="top-head-2">
        <span class="product-list-title">マイページ</span>
        <div>
            <a href="{{ route('top') }}" class="button-top-center-2">トップに戻る</a>
            <a href="{{ route('logout') }}" class="button-top-right-2">ログアウト</a>
        </div>
    </div>
    <div class="mypage-index-member">
        <div class="mypage-index-member-left">
            <span>氏名</span>
        </div>
        <div>
            <span>{{ Auth::user()->name_sei }}　{{ Auth::user()->name_mei }}</span>
        </div>
    </div>
    <div class="mypage-index-member">
        <div class="mypage-index-member-left">
            <span>ニックネーム</span>
        </div>
        <div>
            <span>{{ Auth::user()->nickname }}</span>
        </div>
    </div>
    <div class="mypage-index-member">
        <div class="mypage-index-member-left">
            <span>性別</span>
        </div>
        <div>
            <span>
                @foreach (config('master.gender') as $index => $value)
                    @if (Auth::user()->gender == $index) {{ $value }} @endif
                @endforeach
            </span>
        </div>
    </div>
    <div class="mypage-index-member">
        <div class="mypage-index-member-left">
            <span>パスワード</span>
        </div>
        <div>
            <span>セキュリティのため非表示</span>
        </div>
    </div>
    <div class="mypage-index-member">
        <div class="mypage-index-member-left">
            <span>メールアドレス</span>
        </div>
        <div>
            <span>{{ Auth::user()->email }}</span>
        </div>
    </div>
    <div class="mypage-index-button">
        <a href="{{ route('mypage.confirm') }}" class="mypage-index-delete-button">退会</a>
    </div>
</body>
</html>