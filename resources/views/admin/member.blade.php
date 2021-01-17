<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>会員一覧ページ</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
</head>
<body id="admin">
    <div class="admin-index-header">
        <span class="admin-title">会員一覧</span>
        <div><a href="{{ route('admin') }}" class="admin-member-header-button">トップへ戻る</a></div>
    </div>
    <div class="admin-member-main">
        <form action="{{ route('admin.member') }}" method="POST">
            @csrf
            <div class="admin-member-main-join">
                <a href="join.php" class="admin-member-main-join-button">会員登録</a>
            </div>
            <div class="admin-member-main-search">
                <div class="admin-member-main-search-1">
                    <span class="admin-member-main-search-1-left">ID</span>
                    <span class="admin-member-main-search-1-right"><input type="text" name="id" size="40" maxlength="255" value="{{ $data['id'] }}" class="admin-member-main-search-1-right-id"></span>
                </div>
                <div class="admin-member-main-search-2">
                    <span class="admin-member-main-search-2-left">性別</span>
                    <span class="admin-member-main-search-2-right">
                        @foreach (config('master.gender') as $index => $value)
                            <input type="radio" name="gender" value="{{ $index }}" @if($data['gender'] == $index) checked @endif class="admin-member-main-search-2-right-gender">{{ $value }}
                        @endforeach
                    </span>
                </div>
                <div class="admin-member-main-search-3">
                    <span class="admin-member-main-search-3-left">フリーワード</span>
                    <span class="admin-member-main-search-3-right"><input type="text" name="free" size="40" maxlength="255" value="{{ $data['free'] }}" class="admin-member-main-search-3-right-free"></span>
                </div>
            </div>
            <div class="button">
                <input type="hidden" name="order" value="{{ $order }}">
                <input type="submit" value="検索する" class="admin-member-main-search-button">
            </div>
            <div class="admin-member-main-result">
                <div class="admin-member-main-result-top">
                    <span class="admin-member-main-result-top-id">
                        ID
                        @if ($order == 1)
                            <a href="{{ route('admin.member', ['page' => $page, 'order' => 2, 'id' => $data['id'], 'gender' => $data['gender'], 'free' => $data['free']]) }}"><i class="far fa-caret-square-up"></i></a>
                        @else
                            <a href="{{ route('admin.member', ['page' => $page, 'order' => 1, 'id' => $data['id'], 'gender' => $data['gender'], 'free' => $data['free']]) }}"><i class="far fa-caret-square-down"></i></a>
                        @endif
                    </span>
                    <span class="admin-member-main-result-top-name">氏名</span>
                    <span class="admin-member-main-result-top-gender">性別</span>
                    <span class="admin-member-main-result-top-email">メールアドレス</span>
                    <span class="admin-member-main-result-top-created_at">
                        登録日時
                        @if ($order == 1)
                            <a href="{{ route('admin.member', ['page' => $page, 'order' => 2, 'id' => $data['id'], 'gender' => $data['gender'], 'free' => $data['free']]) }}"><i class="far fa-caret-square-up"></i></a>
                        @else
                            <a href="{{ route('admin.member', ['page' => $page, 'order' => 1, 'id' => $data['id'], 'gender' => $data['gender'], 'free' => $data['free']]) }}"><i class="far fa-caret-square-down"></i></a>
                        @endif
                    </span>
                    <span class="admin-member-main-result-top-edit">編集</span>
                    <span class="admin-member-main-result-top-detail">詳細</span>
                </div>
                @foreach ($members as $member)
                    <div class="admin-member-main-result-main">
                        <span class="admin-member-main-result-main-id">{{ $member->id }}</span>
                        <a href="" class="admin-member-main-result-main-name">{{ $member->name_sei }}　{{ $member->name_mei }}</a>
                        <span class="admin-member-main-result-main-gender">
                            @foreach (config('master.gender') as $index => $value)
                                @if ($member->gender == $index) {{ $value }} @endif
                            @endforeach            
                        </span>
                        <span class="admin-member-main-result-main-email">{{ $member->email }}</span>
                        <span class="admin-member-main-result-main-created_at">{{ $member->created_at }}</span>
                        <a href="" class="admin-member-main-result-main-edit">編集</a>
                        <a href="" class="admin-member-main-result-main-detail">詳細</a>
                    </div>
                @endforeach
                <div class="admin-member-main-page">
                    @if (count($members))
                        <div class="admin-member-main-page-content">
                            @if ($members->onFirstPage())
                                <span class="admin-member-main-page-left-off"></span>
                            @else
                                <a href="{{ $members->appends(['order' => $order])->previousPageUrl() }}" class="admin-member-main-page-prev">前へ＞</a>
                                <a href="{{ $members->appends(['order' => $order])->previousPageUrl() }}" class="admin-member-main-page-left-on">{{ $members->currentPage() - 1 }}</a>
                            @endif
                            <span class="admin-member-main-page-center">{{ $members->currentPage() }}</span>
                            @if ($members->hasMorePages())
                                <a href="{{ $members->appends(['order' => $order])->nextPageUrl() }}" class="admin-member-main-page-right-on">{{ $members->currentPage() + 1 }}</a>
                                <a href="{{ $members->appends(['order' => $order])->nextPageUrl() }}" class="admin-member-main-page-next">次へ＞</a>
                            @else
                                <span class="admin-member-main-page-right-off"></span>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
</body>
</html>