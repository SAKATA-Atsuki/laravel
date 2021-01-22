<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品カテゴリ編集ページ</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
</head>
<body id="admin">
    <div class="admin-index-header">
        <span class="admin-title">商品カテゴリ編集</span>
        <div><a href="{{ route('admin.category') }}" class="admin-register-header-button">一覧へ戻る</a></div>
    </div>
    <div class="admin-category-register">
        <form action="{{ route('admin.category.edit') }}" method="POST">
            @csrf
            <div class="admin-category-register-content">
                <span class="admin-category-register-content-left">商品大カテゴリID</span>
                <span>{{ $category->id }}</span>    
            </div>
            <br>
            <div class="admin-category-register-content">
                <span class="admin-category-register-content-left">商品大カテゴリ</span>
                <input type="text" name="category" size="60" value="{{ $category->name }}">
            </div>
            @error('category')
                <p class="error">{{ $message }}</p>
            @enderror
            <br>
            <div class="admin-category-register-content">
                <span class="admin-category-register-content-left">商品小カテゴリ</span>
                <input type="text" name="subcategory1" size="60" value="{{ $subcategories[0]->name }}">
            </div>
            @error('subcategory1')
                <p class="error">{{ $message }}</p>
            @enderror
            @for ($i = 2; $i <= count($subcategories); $i++)
                <br>
                <div class="admin-category-register-content">
                    <span class="admin-category-register-content-left">　</span>
                    <input type="text" name="{{ 'subcategory' . $i }}" size="60" value="@if(null !== old('subcategory' . $i)){{ old('subcategory' . $i) }}@else{{ $subcategories[$i - 1]->name }}@endif">
                </div>
                @error('subcategory' . $i)
                    <p class="error">{{ $message }}</p>
                @enderror
            @endfor
            @for ($i = count($subcategories) + 1; $i <= 10; $i++)
                <br>
                <div class="admin-category-register-content">
                    <span class="admin-category-register-content-left">　</span>
                    <input type="text" name="{{ 'subcategory' . $i }}" size="60" value="{{ old('subcategory' . $i) }}">
                </div>
                @error('subcategory' . $i)
                    <p class="error">{{ $message }}</p>
                @enderror
            @endfor            
            <div class="admin-category-register-button">
                <input type="hidden" name="id" value="{{ $category->id }}">
                <input type="submit" value="確認画面へ" class="button-admin-register">
            </div>
        </form>
    </div>
</body>
</html>