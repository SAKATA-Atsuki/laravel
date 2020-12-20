<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品レビュー登録</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div id="top-head-2">
        <span class="product-list-title">商品レビュー登録</span>
        <div>
            <a href="{{ route('top') }}" class="button-top-right-1">トップに戻る</a>
        </div>
    </div>
    <div class="review-register">
        <div class="review-register-content">
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
        <form action="{{ route('review.check') }}" method="POST">
            @csrf
            <div class="review-register-review">
                <div class="review-register-review-left">
                    <span>商品評価</span>
                </div>
                <div class="review-register-review-right">
                    <select name="evaluation" class="review-register-evaluation">
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" @if (old('evaluation') == $i) selected @endif>{{ $i }}</option>
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
                    <textarea name="comment" cols="40" rows="6">{{ old('comment') }}</textarea>
                </div>
            </div>
            @error('comment')
                <p class="error">{{ $message }}</p>
            @enderror
            <div class="review-register-button">
                <input type="hidden" name="page" value="{{ $page }}">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="star" value="{{ $star }}">
                <input type="submit" value="商品レビュー登録確認" class="button-review-register-1">
                <br>
                <a href="{{ route('product.detail', ['page' => $page, 'id' => $product->id]) }}" class="button-review-register-2">商品詳細に戻る</a>
            </div>
        </form>
    </div>
</body>
</html>