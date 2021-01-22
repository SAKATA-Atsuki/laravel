<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品カテゴリ編集確認画面</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
</head>
<body id="admin">
    <div class="admin-index-header">
        <span class="admin-title">商品カテゴリ編集確認</span>
        <div><a href="{{ route('admin.category') }}" class="admin-register-header-button">一覧へ戻る</a></div>
    </div>
    <div class="admin-category-register">
        <div class="admin-category-register-content">
            <span class="admin-category-register-content-left">商品大カテゴリID</span>
            <span>{{ $session_category_edit['id'] }}</span>    
        </div>
        <br>
        <div class="admin-category-register-content">
            <span class="admin-category-register-content-left">商品大カテゴリ</span>
            <span>{{ $session_category_edit['category'] }}</span>
        </div>
        <br>
        <div class="admin-category-register-content">
            <span class="admin-category-register-content-left">商品小カテゴリ</span>
            <span>{{ $session_category_edit['subcategory1'] }}</span>
        </div>
        @for ($i = 2; $i <= 10; $i++)
            @if ($session_category_edit['subcategory' . $i] != '')
                <br>
                <div class="admin-category-register-content">
                    <span class="admin-category-register-content-left">　</span>
                    <span>{{ $session_category_edit['subcategory' . $i] }}</span>
                </div>    
            @endif
        @endfor
        <form action="{{ route('admin.category.edit.store') }}" method="POST">
            @csrf
            <div class="admin-check-button">
                <input type="hidden" name="action" value="submit">
                <input type="submit" value="編集完了" class="button-admin-register">
            </div>
        </form>
    </div>
</body>
</html>