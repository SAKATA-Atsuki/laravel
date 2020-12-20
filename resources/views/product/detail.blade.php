<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品詳細</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div id="top-head-2">
        <span class="product-list-title">商品詳細</span>
        <div>
            <a href="{{ route('top') }}" class="button-top-right-1">トップに戻る</a>
        </div>
    </div>
    <br>
    <div class="product-detail">
        <p>
            @foreach (config('master.category') as $index => $value)
                @if ($product->product_category_id == $index) {{ $value }} @endif
            @endforeach
            ＞
            @foreach (config('master.subcategory') as $index => $value)
                @if ($product->product_subcategory_id == $index) {{ $value }} @endif
            @endforeach
        </p>
        <span class="product-detail-name">{{ $product->name }}</span>
        <span>更新日時：{{ $product->updated_at }}</span>
        <div class="product-detail-images">
            @if ($product->image_1)
                <img src="{{ asset('images/' . $product->image_1) }}" class="product-detail-image">
            @endif
            @if ($product->image_2)
                <img src="{{ asset('images/' . $product->image_2) }}" class="product-detail-image">
            @endif
            @if ($product->image_3)
                <img src="{{ asset('images/' . $product->image_3) }}" class="product-detail-image">
            @endif
            @if ($product->image_4)
                <img src="{{ asset('images/' . $product->image_4) }}" class="product-detail-image">
            @endif
        </div>
        <p>■商品説明</p>
        <p>{!! nl2br(e($product->product_content)) !!}</p>
        <br>
        <p>■商品レビュー</p>
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
        <br><br>
        <a href="{{ route('review.list', ['pg' => $page, 'id' => $product->id]) }}" class="product-detail-to-review">＞＞レビューを見る</a>
        <br><br>
        @if (Auth::check())
            <div class="product-detail-button">
                <a href="{{ route('review.register', ['page' => $page, 'id' => $product->id]) }}" class="button-product-detail-1">この商品についてのレビューを登録</a>
            </div>
        @endif
        <div class="product-detail-button">
            <a href="{{ route('product.list', ['page' => $page]) }}" class="button-product-detail-2">商品一覧に戻る</a>
        </div>
    </div>
</body>
</html>