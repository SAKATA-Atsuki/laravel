<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品レビュー管理</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div id="top-head-2">
        <span class="product-list-title">商品レビュー管理</span>
        <div>
            <a href="{{ route('top') }}" class="button-top-right-1">トップに戻る</a>
        </div>
    </div>
    <div class="mypage-review-list">
        @foreach ($reviews as $review)
            <div class="product-list-bar"></div>
            <div class="product-list">
                <img src="{{ asset('images/' . $review->getProductImage1()) }}" class="product-list-image">
                <div class="product-list-right">
                    <span class="product-list-category">{{ App\Models\Product_category::find($review->getProductCategoryId())->name }}＞{{ App\Models\Product_subcategory::find($review->getProductSubcategoryId())->name }}</span>
                    <br><br>
                    <span class="button-product-list-to-detail-1">{{ $review->getName() }}</span>
                    <div class="product-list-star">
                        @if ($review->evaluation == 0)
                            <span>{{ $review->evaluation }}</span>
                        @endif
                        @if ($review->evaluation == 1)
                            <span>★ {{ $review->evaluation }}</span>
                        @endif
                        @if ($review->evaluation == 2)
                            <span>★★ {{ $review->evaluation }}</span>
                        @endif
                        @if ($review->evaluation == 3)
                            <span>★★★ {{ $review->evaluation }}</span>
                        @endif
                        @if ($review->evaluation == 4)
                            <span>★★★★ {{ $review->evaluation }}</span>
                        @endif
                        @if ($review->evaluation == 5)
                            <span>★★★★★ {{ $review->evaluation }}</span>
                        @endif
                        <br>
                        @if (mb_strlen($review->comment) > 15)
                            <span>{{ mb_substr($review->comment, 0, 15) }}…</span>
                        @else
                            <span>{{ $review->comment }}</span>
                        @endif
                    </div>
                    <div class="button-mypage-review-list">
                        <a href="{{ route('mypage.review.edit', ['page' => $page, 'review_id' => $review->id, 'product_id' => $review->product_id]) }}" class="button-mypage-review-list-1">レビュー編集</a>
                        <a href="{{ route('mypage.review.delete', ['page' => $page, 'review_id' => $review->id, 'product_id' => $review->product_id]) }}" class="button-mypage-review-list-1">レビュー削除</a>
                    </div>            
                </div>    
            </div>
        @endforeach
        @if (count($reviews))
            <div class="product-list-page">
                @if ($reviews->onFirstPage())
                    <span class="admin-member-main-page-left-off"></span>
                @else
                    <a href="{{ $reviews->previousPageUrl() }}" class="admin-member-main-page-prev">前へ＞</a>
                    <a href="{{ $reviews->previousPageUrl() }}" class="admin-member-main-page-left-on">{{ $reviews->currentPage() - 1 }}</a>
                @endif
                <span class="admin-member-main-page-center">{{ $reviews->currentPage() }}</span>
                @if ($reviews->hasMorePages())
                    <a href="{{ $reviews->nextPageUrl() }}" class="admin-member-main-page-right-on">{{ $reviews->currentPage() + 1 }}</a>
                    <a href="{{ $reviews->nextPageUrl() }}" class="admin-member-main-page-next">次へ＞</a>
                @else
                    <span class="admin-member-main-page-right-off"></span>
                @endif
            </div>
        @endif
        <div class="mypage-review-list-button">
            <a href="{{ route('mypage') }}" class="mypage-review-list-button-1">マイページに戻る</a>    
        </div>
    </div>
</body>
</html>