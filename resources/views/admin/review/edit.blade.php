<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品レビュー編集ページ</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id="admin">
    <div class="admin-index-header">
        <span class="admin-title">商品レビュー編集</span>
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
        <form action="{{ route('admin.review.edit') }}" method="POST">
            @csrf
            <div class="review-register-review">
                <div class="review-register-review-left">
                    <span>ID</span>
                </div>
                <div>
                    <span>{{ $review->id }}</span>
                </div>
            </div>
            <div class="review-register-review">
                <div class="review-register-review-left">
                    <span>商品評価</span>
                </div>
                <div class="review-register-review-right">
                    <select name="evaluation" class="review-register-evaluation">
                        @php
                            if (null !== old('evaluation')) {
                                $evaluation = old('evaluation');
                            } else {
                                $evaluation = $review->evaluation;
                            }
                        @endphp
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" @if ($evaluation == $i) selected @endif>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            @error('evaluation')
                <p class="error">{{ $message }}</p>
            @enderror
            <div class="review-register-review">
                <div class="review-register-review-left">
                    <span>商品コメント</span>
                </div>
                <div class="review-register-review-right">
                    <textarea name="comment" cols="40" rows="6">@if(null !== old('comment')){{ old('comment') }}@else{{ $review->comment }}@endif</textarea>
                </div>
            </div>
            @error('comment')
                <p class="error">{{ $message }}</p>
            @enderror
            <div class="admin-category-register-button">
                <input type="hidden" name="id" value="{{ $review->id }}">
                <input type="hidden" name="star" value="{{ $star }}">
                <input type="submit" value="確認画面へ" class="button-admin-review-register">
            </div>
        </form>
    </div>
</body>
</html>