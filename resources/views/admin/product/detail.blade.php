<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品詳細画面</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id="admin">
    <div class="admin-index-header">
        <span class="admin-title">商品詳細</span>
        <div><a href="{{ route('admin.product') }}" class="admin-register-header-button">一覧へ戻る</a></div>
    </div>
    <div id="admin-product-register-content">
        <div>
            <span>ID</span>
            <span style="margin-left: 172px;">{{ $product->id }}</span>
        </div>
        <br>
        <div class="product-check">
            <span class="product-check-left">商品名</span>
            <span class="product-check-right">{{ $product->name }}</span>
        </div>
        <br>
        <div class="product-check">
            <span class="product-check-left">商品カテゴリ</span>
            <span class="product-check-right">{{ $category->name }}＞{{ $subcategory->name }}</span>
        </div>
        <br>
        <div class="product-check">
            <span class="product-check-left">商品写真</span>
            <div class="product-check-right">
                <span>写真１</span>
                @if (null !== $product->image_1)
                    <div class="product-register-image-box-1">
                        <img src="{{ asset('images/' . $product->image_1) }}" class="product-register-image-1">
                    </div>
                @endif
                <br>
                <span>写真２</span>
                @if (null !== $product->image_2)
                    <div class="product-register-image-box-2">
                        <img src="{{ asset('images/' . $product->image_2) }}" class="product-register-image-2">
                    </div>
                @endif
                <br>
                <span>写真３</span>
                @if (null !== $product->image_3)
                    <div class="product-register-image-box-3">
                        <img src="{{ asset('images/' . $product->image_3) }}" class="product-register-image-3">
                    </div>
                @endif
                <br>
                <span>写真４</span>
                @if (null !== $product->image_4)
                    <div class="product-register-image-box-4">
                        <img src="{{ asset('images/' . $product->image_4) }}" class="product-register-image-4">
                    </div>
                @endif
            </div>
        </div>
        <br>
        <div class="product-check">
            <span class="product-check-left">商品説明</span>
            <span class="product-check-right">{!! nl2br(e($product->product_content)) !!}</span>
        </div>
    </div>
    <div class="admin-product-evaluation">
        <div class="admin-product-comprehensive-evaluation">
            <span class="admin-product-comprehensive-evaluation-left">総合評価</span>
            <div class="admin-product-comprehensive-evaluation-center">
                @if ($star == 0)
                    <span></span>
                @endif
                @if ($star == 1)
                    <span>★</span>
                @endif
                @if ($star == 2)
                    <span>★★</span>
                @endif
                @if ($star == 3)
                    <span>★★★</span>
                @endif
                @if ($star == 4)
                    <span>★★★★</span>
                @endif
                @if ($star == 5)
                    <span>★★★★★</span>
                @endif
            </div>
            <span>{{ $star }}</span>        
        </div>
    </div>
    @foreach ($reviews as $review)
        <div class="admin-product-detail-reviews">
            <div class="admin-product-detail-review">
                <span class="admin-product-detail-review-id">商品レビューID　　{{ $review->id }}</span>
            </div>
            <div class="admin-product-detail-review">
                <a href="{{ route('admin.member.detail', ['id' => $review->member_id]) }}" class="admin-product-detail-review-name">{{ $review->getMemberNickname() }}さん</a>
                <div class="admin-product-comprehensive-evaluation-center">
                    @if ($review->evaluation == 0)
                        <span></span>
                    @endif
                    @if ($review->evaluation == 1)
                        <span>★</span>
                    @endif
                    @if ($review->evaluation == 2)
                        <span>★★</span>
                    @endif
                    @if ($review->evaluation == 3)
                        <span>★★★</span>
                    @endif
                    @if ($review->evaluation == 4)
                        <span>★★★★</span>
                    @endif
                    @if ($review->evaluation == 5)
                        <span>★★★★★</span>
                    @endif
                </div>
                <span>{{ $review->evaluation }}</span>    
            </div>
            <div class="admin-product-detail-review">
                <span class="admin-product-detail-review-comment">商品コメント</span>
                <span style="width: 450px;">{{ $review->comment }}</span>
                <a href="{{ route('admin.review.detail', ['id' => $review->id]) }}" class="admin-product-detail-review-detail">商品レビュー詳細</a>
            </div>
        </div>
    @endforeach
    <div class="admin-product-detail-page">
        @if (count($reviews))
            <div class="admin-product-detail-page-content">
                @if ($reviews->onFirstPage())
                    <span class="admin-member-main-page-left-off"></span>
                @else
                    <a href="{{ $reviews->appends(['id' => $product->id])->previousPageUrl() }}" class="admin-member-main-page-prev">前へ＞</a>
                    <a href="{{ $reviews->appends(['id' => $product->id])->previousPageUrl() }}" class="admin-member-main-page-left-on">{{ $reviews->currentPage() - 1 }}</a>
                @endif
                <span class="admin-member-main-page-center">{{ $reviews->currentPage() }}</span>
                @if ($reviews->hasMorePages())
                    <a href="{{ $reviews->appends(['id' => $product->id])->nextPageUrl() }}" class="admin-member-main-page-right-on">{{ $reviews->currentPage() + 1 }}</a>
                    <a href="{{ $reviews->appends(['id' => $product->id])->nextPageUrl() }}" class="admin-member-main-page-next">次へ＞</a>
                @else
                    <span class="admin-member-main-page-right-off"></span>
                @endif
            </div>
        @endif
    </div>
    <div class="admin-product-detail-button">
        <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}" class="admin-member-detail-button-left">編集</a>
        <a href="{{ route('admin.product.detail.delete', ['id' => $product->id]) }}" class="admin-member-detail-button-right">削除</a>
    </div>
</body>
</html>