<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品レビュー編集確認画面</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id="admin">
    <div class="admin-index-header">
        <span class="admin-title">商品レビュー編集確認画面</span>
        <div><a href="{{ route('admin.review') }}" class="admin-register-header-button">一覧へ戻る</a></div>
    </div>
    <div class="review-register">
        <div class="review-register-content">
            <img src="{{ asset('images/' . $product->image_1) }}" class="review-register-image">
            <div>
                <p>商品ID　{{ $product->id }}</p>
                <p>{{ $product->name }}</p>
                <span>総合評価</span>
                @if ($session_review_edit['star'] == 0)
                    <span>　</span>
                @endif
                @if ($session_review_edit['star'] == 1)
                    <span>　★</span>
                @endif
                @if ($session_review_edit['star'] == 2)
                    <span>　★★</span>
                @endif
                @if ($session_review_edit['star'] == 3)
                    <span>　★★★</span>
                @endif
                @if ($session_review_edit['star'] == 4)
                    <span>　★★★★</span>
                @endif
                @if ($session_review_edit['star'] == 5)
                    <span>　★★★★★</span>
                @endif
                <span>{{ $session_review_edit['star'] }}</span>        
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
                <span>{{ $session_review_edit['evaluation'] }}</span>
            </div>
        </div>
        <div class="review-register-review">
            <div class="review-register-check-review-left">
                <span>商品コメント</span>
            </div>
            <div class="review-register-review-right">
                <span>{!! nl2br(e($session_review_edit['comment'])) !!}</span>
            </div>
        </div>
        <form action="{{ route('admin.review.edit.store') }}" method="POST">
            <div class="review-check-button">
                @csrf
                <input type="submit" value="登録完了" class="button-admin-review-register-check-1">
                <br>
                <input type="submit" value="前に戻る" name="back" class="button-admin-review-register-check-2">    
            </div>
        </form>
    </div>
</body>
</html>