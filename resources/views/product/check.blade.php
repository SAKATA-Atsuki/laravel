<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品登録確認画面</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div id="head">
        <p>商品登録確認画面</p>
    </div>
    <div id="product-register-content">
        <div class="product-check">
            <span class="product-check-left">商品名</span>
            <span class="product-check-right">{{ $product['name'] }}</span>
        </div>
        <br>
        <div class="product-check">
            <span class="product-check-left">商品カテゴリ</span>
            <span class="product-check-right">
                @foreach (config('master.category') as $index => $value)
                    @if ($product['category'] == $index) {{ $value }} @endif
                @endforeach
                ＞
                @foreach (config('master.subcategory') as $index => $value)
                    @if ($product['subcategory'] == $index) {{ $value }} @endif
                @endforeach
            </span>
        </div>
        <br>
        <div class="product-check">
            <span class="product-check-left">商品写真</span>
            <div class="product-check-right">
                <span>写真１</span>
                @if ($product['product-register-image-1'])
                    <div class="product-register-image-box-1">
                        <img src="{{ asset('images/' . $product['product-register-image-1']) }}" class="product-register-image-1">
                    </div>
                @endif
                <br>
                <span>写真２</span>
                @if ($product['product-register-image-2'])
                    <div class="product-register-image-box-2">
                        <img src="{{ asset('images/' . $product['product-register-image-2']) }}" class="product-register-image-2">
                    </div>
                @endif
                <br>
                <span>写真３</span>
                @if ($product['product-register-image-3'])
                    <div class="product-register-image-box-3">
                        <img src="{{ asset('images/' . $product['product-register-image-3']) }}" class="product-register-image-3">
                    </div>
                @endif
                <br>
                <span>写真４</span>
                @if ($product['product-register-image-4'])
                    <div class="product-register-image-box-4">
                        <img src="{{ asset('images/' . $product['product-register-image-4']) }}" class="product-register-image-4">
                    </div>
                @endif
            </div>
        </div>
        <br>
        <div class="product-check">
            <span class="product-check-left">商品説明</span>
            <span class="product-check-right">{!! nl2br(e($product['explanation'])) !!}</span>
        </div>
        <br>
        <form action="{{ route('product.store') }}" method="POST">
            <div class="button-register-product">
                @csrf
                <input type="submit" value="商品を登録する" class="button-check-product-1">
                <br>
                <input type="submit" value="前に戻る" name="back" class="button-check-product-2">    
            </div>
        </form>
    </div>
</body>
</html>