<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品レビュー一覧ページ</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
</head>
<body id="admin">
    <div class="admin-index-header">
        <span class="admin-title">商品レビュー一覧</span>
        <div><a href="{{ route('admin.review') }}" class="admin-register-header-button">一覧へ戻る</a></div>
    </div>
    <div class="admin-member-main">
        <form action="{{ route('admin.review') }}" method="POST">
            @csrf
            <div class="admin-member-main-join">
                <a href="{{ route('admin.review.register') }}" class="admin-member-main-join-button">商品レビュー登録</a>
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
                <div class="admin-review-main-result-top">
                    <span class="admin-review-main-result-top-id">
                        ID
                        @if ($order == 1)
                            <a href="{{ route('admin.review', ['page' => $page, 'order' => 2, 'id' => $data['id'], 'free' => $data['free']]) }}"><i class="far fa-caret-square-up"></i></a>
                        @else
                            <a href="{{ route('admin.review', ['page' => $page, 'order' => 1, 'id' => $data['id'], 'free' => $data['free']]) }}"><i class="far fa-caret-square-down"></i></a>
                        @endif
                    </span>
                    <span class="admin-review-main-result-top-product_id">商品ID</span>
                    <span class="admin-review-main-result-top-evaluation">評価</span>
                    <span class="admin-review-main-result-top-comment">商品コメント</span>
                    <span class="admin-review-main-result-top-created_at">
                        登録日時
                        @if ($order == 1)
                            <a href="{{ route('admin.review', ['page' => $page, 'order' => 2, 'id' => $data['id'], 'free' => $data['free']]) }}"><i class="far fa-caret-square-up"></i></a>
                        @else
                            <a href="{{ route('admin.review', ['page' => $page, 'order' => 1, 'id' => $data['id'], 'free' => $data['free']]) }}"><i class="far fa-caret-square-down"></i></a>
                        @endif
                    </span>
                    <span class="admin-review-main-result-top-edit">編集</span>
                    <span class="admin-review-main-result-top-detail">詳細</span>
                </div>
                @foreach ($reviews as $review)
                    <div class="admin-review-main-result-main">
                        <span class="admin-review-main-result-main-id">{{ $review->id }}</span>
                        <span class="admin-review-main-result-main-product_id">{{ $review->product_id }}</span>
                        <span class="admin-review-main-result-main-evaluation">{{ $review->evaluation }}</span>
                        <a href="{{ route('admin.review.detail', ['id' => $review->id]) }}" class="admin-review-main-result-main-comment">
                            @if (mb_strlen($review->comment) > 7)
                                {{ mb_substr($review->comment, 0, 7) }}…
                            @else
                                {{ $review->comment }}
                            @endif
                        </a>
                        <span class="admin-review-main-result-main-created_at">{{ $review->created_at }}</span>
                        <a href="{{ route('admin.review.edit', ['id' => $review->id]) }}" class="admin-review-main-result-main-edit">編集</a>
                        <a href="{{ route('admin.review.detail', ['id' => $review->id]) }}" class="admin-review-main-result-main-detail">詳細</a>
                    </div>
                @endforeach
                <div class="admin-review-main-page">
                    @if (count($reviews))
                        <div class="admin-member-main-page-content">
                            @if ($reviews->onFirstPage())
                                <span class="admin-member-main-page-left-off"></span>
                            @else
                                <a href="{{ $reviews->appends(['order' => $order])->previousPageUrl() }}" class="admin-member-main-page-prev">前へ＞</a>
                                <a href="{{ $reviews->appends(['order' => $order])->previousPageUrl() }}" class="admin-member-main-page-left-on">{{ $reviews->currentPage() - 1 }}</a>
                            @endif
                            <span class="admin-member-main-page-center">{{ $reviews->currentPage() }}</span>
                            @if ($reviews->hasMorePages())
                                <a href="{{ $reviews->appends(['order' => $order])->nextPageUrl() }}" class="admin-member-main-page-right-on">{{ $reviews->currentPage() + 1 }}</a>
                                <a href="{{ $reviews->appends(['order' => $order])->nextPageUrl() }}" class="admin-member-main-page-next">次へ＞</a>
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