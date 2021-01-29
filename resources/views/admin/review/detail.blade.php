<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品レビュー詳細画面</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id="admin">
    <div class="admin-index-header">
        <span class="admin-title">商品レビュー詳細</span>
        <div><a href="{{ route('admin.review') }}" class="admin-register-header-button">一覧へ戻る</a></div>
    </div>
    <div class="review-register">
        <div class="review-register-content">
            <img src="{{ asset('images/' . $product->image_1) }}" class="review-register-image">
            <div>
                <p>商品ID　{{ $product->id }}</p>
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
        <div class="review-register-review">
            <div class="review-register-check-review-left">
                <span>ID</span>
            </div>
            <div class="review-register-review-right">
                <span>{{ $review->id }}</span>
            </div>
        </div>
        <div class="review-register-review">
            <div class="review-register-check-review-left">
                <span>商品評価</span>
            </div>
            <div class="review-register-review-right">
                <span>{{ $review->evaluation }}</span>
            </div>
        </div>
        <div class="review-register-review">
            <div class="review-register-check-review-left">
                <span>商品コメント</span>
            </div>
            <div class="review-register-review-right">
                <span>{!! nl2br(e($review->comment)) !!}</span>
            </div>
        </div>
        <div class="admin-product-detail-button">
            <a href="{{ route('admin.review.edit', ['id' => $review->id]) }}" class="admin-member-detail-button-left">編集</a>
            <a href="{{ route('admin.review.detail.delete', ['id' => $review->id]) }}" class="admin-member-detail-button-right">削除</a>
        </div>
    </div>
</body>
</html>