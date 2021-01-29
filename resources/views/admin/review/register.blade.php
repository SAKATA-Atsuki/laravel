<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品レビュー登録ページ</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id="admin">
    <div class="admin-index-header">
        <span class="admin-title">商品レビュー登録</span>
        <div><a href="{{ route('admin.review') }}" class="admin-register-header-button">一覧へ戻る</a></div>
    </div>
    <div class="review-register">
        <form action="{{ route('admin.review.register') }}" method="POST">
            @csrf
            <div class="review-register-review">
                <div class="review-register-review-left">
                    <span>ID</span>
                </div>
                <div>
                    <span>登録後に自動採番</span>
                </div>
            </div>
            <div class="review-register-review">
                <div class="review-register-review-left">
                    <span>商品</span>
                </div>
                <div class="review-register-review-right">
                    <select name="product_id" class="admin-review-register-product">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" @if (old('product_id') == $product->id) selected @endif>{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @error('product_id')
                <p class="error">{{ $message }}</p>
            @enderror
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
            <div class="admin-category-register-button">
                <input type="submit" value="確認画面へ" class="button-admin-review-register">
            </div>
        </form>
    </div>
</body>
</html>