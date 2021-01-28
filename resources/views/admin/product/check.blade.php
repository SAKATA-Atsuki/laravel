<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品登録確認画面</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id="admin">
    <div class="admin-index-header">
        <span class="admin-title">商品登録確認</span>
        <div><a href="{{ route('admin.product') }}" class="admin-register-header-button">一覧へ戻る</a></div>
    </div>
    <div id="admin-product-register-content">
        <div>
            <span>ID</span>
            <span style="margin-left: 172px;">登録後に自動採番</span>
        </div>
        <br>
        <div class="product-check">
            <span class="product-check-left">商品名</span>
            <span class="product-check-right">{{ $session_product_register['name'] }}</span>
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
                @if ($session_product_register['product-register-image-1'])
                    <div class="product-register-image-box-1">
                        <img src="{{ asset('images/' . $session_product_register['product-register-image-1']) }}" class="product-register-image-1">
                    </div>
                @endif
                <br>
                <span>写真２</span>
                @if ($session_product_register['product-register-image-2'])
                    <div class="product-register-image-box-2">
                        <img src="{{ asset('images/' . $session_product_register['product-register-image-2']) }}" class="product-register-image-2">
                    </div>
                @endif
                <br>
                <span>写真３</span>
                @if ($session_product_register['product-register-image-3'])
                    <div class="product-register-image-box-3">
                        <img src="{{ asset('images/' . $session_product_register['product-register-image-3']) }}" class="product-register-image-3">
                    </div>
                @endif
                <br>
                <span>写真４</span>
                @if ($session_product_register['product-register-image-4'])
                    <div class="product-register-image-box-4">
                        <img src="{{ asset('images/' . $session_product_register['product-register-image-4']) }}" class="product-register-image-4">
                    </div>
                @endif
            </div>
        </div>
        <br>
        <div class="product-check">
            <span class="product-check-left">商品説明</span>
            <span class="product-check-right">{!! nl2br(e($session_product_register['explanation'])) !!}</span>
        </div>
        <br>
        <form action="{{ route('admin.product.register.store') }}" method="POST">
            <div class="button-register-product">
                @csrf
                <input type="submit" value="登録完了" class="button-admin-register">
            </div>
        </form>
    </div>
</body>
</html>