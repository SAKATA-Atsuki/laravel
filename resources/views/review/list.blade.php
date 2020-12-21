<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品レビュー一覧</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div id="top-head-2">
        <span class="product-list-title">商品レビュー一覧</span>
        <div>
            <a href="{{ route('top') }}" class="button-top-right-1">トップに戻る</a>
        </div>
    </div>
    <div class="review-register">
        <div class="review-list-content">
            <img src="{{ asset('images/' . $product->image_1) }}" class="review-register-image">
            <div>
                <p>{{ $product->name }}</p>
                <span>総合評価</span>
                @if ($star == 0)
                    <span>　</span>
                @endif
                @if ($star == 1)
                    <span>　★</span>
                @endif
                @if ($star == 2)
                    <span>　★★</span>
                @endif
                @if ($star == 3)
                    <span>　★★★</span>
                @endif
                @if ($star == 4)
                    <span>　★★★★</span>
                @endif
                @if ($star == 5)
                    <span>　★★★★★</span>
                @endif
                <span>{{ $star }}</span>        
            </div>    
        </div>
        @if (count($results))
            <div class="review-list-results">
                @foreach ($results as $result)
                    <div class="review-list-result">
                        <div class="review-list-result-content">
                            <div class="review-list-result-left">
                                <span class="review-list-result-name">{{ $result->getNickname() }}さん</span>
                            </div>
                            <div class="review-list-result-center">
                                @if ($result->evaluation == 1)
                                    <span>★</span>
                                @endif
                                @if ($result->evaluation == 2)
                                    <span>★★</span>
                                @endif
                                @if ($result->evaluation == 3)
                                    <span>★★★</span>
                                @endif
                                @if ($result->evaluation == 4)
                                    <span>★★★★</span>
                                @endif
                                @if ($result->evaluation == 5)
                                    <span>★★★★★</span>
                                @endif        
                            </div>
                            <div>
                                <span>{{ $result->evaluation }}</span>
                            </div>
                        </div>
                        <div class="review-list-result-content">
                            <div class="review-list-result-left">
                                <span class="review-list-result-name">商品コメント</span>
                            </div>
                            <div>
                                <span>{!! nl2br(e($result->comment)) !!}</span>
                            </div>
                        </div>    
                    </div>
                @endforeach
            </div>
            <div class="review-list-page">
                @if ($results->onFirstPage())
                    <span class="admin-member-main-page-left-off"></span>
                @else
                    <a href="{{ $results->previousPageUrl() }}" class="admin-member-main-page-prev">前へ＞</a>
                    <a href="{{ $results->previousPageUrl() }}" class="admin-member-main-page-left-on">{{ $results->currentPage() - 1 }}</a>
                @endif
                <span class="admin-member-main-page-center">{{ $results->currentPage() }}</span>
                @if ($results->hasMorePages())
                    <a href="{{ $results->nextPageUrl() }}" class="admin-member-main-page-right-on">{{ $results->currentPage() + 1 }}</a>
                    <a href="{{ $results->nextPageUrl() }}" class="admin-member-main-page-next">次へ＞</a>
                @else
                    <span class="admin-member-main-page-right-off"></span>
                @endif
            </div>
        @endif
        <div class="review-list-button">
            <a href="{{ route('product.detail', ['page' => $pg, 'id' => $product->id]) }}" class="button-review-complete-2">商品詳細に戻る</a>
        </div>
    </div>
</body>
</html>