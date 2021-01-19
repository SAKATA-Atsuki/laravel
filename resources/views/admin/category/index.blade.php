<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品カテゴリ一覧ページ</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
</head>
<body id="admin">
    <div class="admin-index-header">
        <span class="admin-title">商品カテゴリ一覧</span>
        <div><a href="{{ route('admin') }}" class="admin-member-header-button">トップへ戻る</a></div>
    </div>
    <div class="admin-member-main">
        <form action="{{ route('admin.member') }}" method="POST">
            @csrf
            <div class="admin-member-main-join">
                <a href="{{ route('admin.member.register') }}" class="admin-member-main-join-button">商品カテゴリ登録</a>
            </div>
            <div class="admin-member-main-search">
                <div class="admin-member-main-search-1">
                    <span class="admin-member-main-search-1-left">ID</span>
                    <span class="admin-member-main-search-1-right"><input type="text" name="id" size="40" maxlength="255" value="{{ $data['id'] }}" class="admin-member-main-search-1-right-id"></span>
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
                <div class="admin-category-main-result-top">
                    <span class="admin-category-main-result-top-id">
                        ID
                        @if ($order == 1)
                            <a href="{{ route('admin.category', ['page' => $page, 'order' => 2, 'id' => $data['id'], 'free' => $data['free']]) }}"><i class="far fa-caret-square-up"></i></a>
                        @else
                            <a href="{{ route('admin.category', ['page' => $page, 'order' => 1, 'id' => $data['id'], 'free' => $data['free']]) }}"><i class="far fa-caret-square-down"></i></a>
                        @endif
                    </span>
                    <span class="admin-category-main-result-top-category">商品カテゴリ大</span>
                    <span class="admin-category-main-result-top-created_at">
                        登録日時
                        @if ($order == 1)
                            <a href="{{ route('admin.category', ['page' => $page, 'order' => 2, 'id' => $data['id'], 'free' => $data['free']]) }}"><i class="far fa-caret-square-up"></i></a>
                        @else
                            <a href="{{ route('admin.category', ['page' => $page, 'order' => 1, 'id' => $data['id'], 'free' => $data['free']]) }}"><i class="far fa-caret-square-down"></i></a>
                        @endif
                    </span>
                    <span class="admin-category-main-result-top-edit">編集</span>
                    <span class="admin-category-main-result-top-detail">詳細</span>
                </div>
                @foreach ($categorys as $category)
                    <div class="admin-category-main-result-main">
                        <span class="admin-category-main-result-main-id">{{ $category->id }}</span>
                        <span class="admin-category-main-result-main-category">{{ $category->name }}</span>
                        <span class="admin-category-main-result-main-created_at">{{ $category->created_at }}</span>
                        <a href="{{ route('admin.member.edit', ['id' => $category->id]) }}" class="admin-category-main-result-main-edit">編集</a>
                        <a href="{{ route('admin.member.detail', ['id' => $category->id]) }}" class="admin-category-main-result-main-detail">詳細</a>
                    </div>
                @endforeach
                <div class="admin-category-main-page">
                    @if (count($categorys))
                        <div class="admin-member-main-page-content">
                            @if ($categorys->onFirstPage())
                                <span class="admin-member-main-page-left-off"></span>
                            @else
                                <a href="{{ $categorys->appends(['order' => $order])->previousPageUrl() }}" class="admin-member-main-page-prev">前へ＞</a>
                                <a href="{{ $categorys->appends(['order' => $order])->previousPageUrl() }}" class="admin-member-main-page-left-on">{{ $categorys->currentPage() - 1 }}</a>
                            @endif
                            <span class="admin-member-main-page-center">{{ $categorys->currentPage() }}</span>
                            @if ($categorys->hasMorePages())
                                <a href="{{ $categorys->appends(['order' => $order])->nextPageUrl() }}" class="admin-member-main-page-right-on">{{ $categorys->currentPage() + 1 }}</a>
                                <a href="{{ $categorys->appends(['order' => $order])->nextPageUrl() }}" class="admin-member-main-page-next">次へ＞</a>
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