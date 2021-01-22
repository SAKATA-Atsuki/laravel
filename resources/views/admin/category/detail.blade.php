<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品カテゴリ詳細確認画面</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
</head>
<body id="admin">
    <div class="admin-index-header">
        <span class="admin-title">商品カテゴリ詳細確認</span>
        <div><a href="{{ route('admin.category') }}" class="admin-register-header-button">一覧へ戻る</a></div>
    </div>
    <div class="admin-category-register">
        <div class="admin-category-register-content">
            <span class="admin-category-register-content-left">商品大カテゴリID</span>
            <span>{{ $category->id }}</span>    
        </div>
        <br>
        <div class="admin-category-register-content">
            <span class="admin-category-register-content-left">商品大カテゴリ</span>
            <span>{{ $category->name }}</span>
        </div>
        <br>
        <div class="admin-category-register-content">
            <span class="admin-category-register-content-left">商品小カテゴリ</span>
            <span>{{ $subcategories[0]->name }}</span>
        </div>
        @for ($i = 2; $i <= 10; $i++)
            @isset ($subcategories[$i - 1])
                <br>
                <div class="admin-category-register-content">
                    <span class="admin-category-register-content-left">　</span>
                    <span>{{ $subcategories[$i - 1]->name }}</span>
                </div>    
            @endisset
        @endfor
        <div class="admin-category-detail-button">
            <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}" class="admin-member-detail-button-left">編集</a>
            <a href="{{ route('admin.category.detail.delete', ['id' => $category->id]) }}" class="admin-member-detail-button-right">削除</a>
        </div>
    </div>
</body>
</html>