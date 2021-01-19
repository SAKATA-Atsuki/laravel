<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script type="text/javascript">
        $(function() {
            // categoryが変更された場合
            $('.category').change(function() {
                var category_id = $(this).val();

                // category_idの値を渡す
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    url: "{{ route('product.register.category') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        category_id: category_id
                    }
                })
                .done(function(data) {
                    // subcategoryのoption値を一旦削除
                    $('.subcategory option').remove();

                    // 戻ってきたdataの値をそれぞれoptionタグとして生成し、subcategoryにoptionタグを追加する
                    $.each(data, function(id, name) {
                        $('.subcategory').append($('<option>').text(name).attr('value', id));
                    })
                })
                .fail(function() {
                    console.log("失敗");
                })
            })
        })
    </script>
    <title>商品一覧</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @if (Auth::check())
        <div id="top-head-2">
            <span class="product-list-title">商品一覧</span>
            <div>
                <a href="{{ route('product.register2') }}" class="button-top-right-1">新規商品登録</a>
            </div>
        </div>
    @else
        <div id="top-head-2">
            <span class="product-list-title">商品一覧</span>
        </div>
    @endif
    <div class="product-list-search">
        <form action="{{ route('product.search') }}" method="POST">
            @csrf
            <div>
                <span>カテゴリ</span>
                <select name="category" class="category">
                    <option value="0">----------------</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($session_product_search['category'] == $category->id) selected @endif>{{ $category->name }}</option>
                    @endforeach    
                </select>
                <select name="subcategory" class="subcategory">
                    @if ($session_product_search['subcategory'] == 0)
                        <option value="0">----------------</option>
                    @else
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}" @if ($session_product_search['subcategory'] == $subcategory->id) selected @endif>{{ $subcategory->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <br>
            <div>
                <span>フリーワード</span>
                <input type="text" name="word" size="40" maxlength="255" class="product-list-word" value="{{ $session_product_search['word'] }}">    
            </div>
            <input type="submit" value="商品検索" class="button-product-list-search">
        </form>
    </div>
    <div class="product-list-result">
        @foreach ($results as $result)
            <div class="product-list-bar"></div>
            <div class="product-list">
                <img src="{{ asset('images/' . $result->image_1) }}" class="product-list-image">
                <div class="product-list-right">
                    <span class="product-list-category">
                        @foreach (config('master.category') as $index => $value)
                            @if ($result->product_category_id == $index) {{ $value }} @endif
                        @endforeach
                        ＞
                        @foreach (config('master.subcategory') as $index => $value)
                            @if ($result->product_subcategory_id == $index) {{ $value }} @endif
                        @endforeach
                    </span>
                    <br><br>
                    <a href="{{ route('product.detail', ['page' => $page, 'id' => $result->id]) }}" class="button-product-list-to-detail-1">{{ $result->name }}</a>
                    <div class="product-list-star">
                        @if ($star[$result->id] == 0)
                            <span>{{ $star[$result->id] }}</span>
                        @endif
                        @if ($star[$result->id] == 1)
                            <span>★ {{ $star[$result->id] }}</span>
                        @endif
                        @if ($star[$result->id] == 2)
                            <span>★★ {{ $star[$result->id] }}</span>
                        @endif
                        @if ($star[$result->id] == 3)
                            <span>★★★ {{ $star[$result->id] }}</span>
                        @endif
                        @if ($star[$result->id] == 4)
                            <span>★★★★ {{ $star[$result->id] }}</span>
                        @endif
                        @if ($star[$result->id] == 5)
                            <span>★★★★★ {{ $star[$result->id] }}</span>
                        @endif
                    </div>
                    <div class="product-detail-button">
                        <a href="{{ route('product.detail', ['page' => $page, 'id' => $result->id]) }}" class="button-product-list-to-detail-2">詳細</a>
                    </div>            
                </div>    
            </div>
        @endforeach
        @if (count($results))
            <div class="product-list-page">
                @if ($results->onFirstPage())
                    <span class="admin-member-main-page-left-off"></span>
                @else
                    <a href="{{ $results->previousPageUrl() }}" class="admin-member-main-page-prev">前へ＞</a>
                    <a href="{{ $results->previousPageUrl() }}" class="admin-member-main-page-left-on">{{ $results->currentPage() - 1 }}</a>
                @endif
                <span class="admin-member-main-page-center">{{ $results->currentPage() }}</span>
                @if ($results->hasMorePages())
                    <a href="{{ $results->nextPageUrl() }}" class="admin-member-main-page-right-on">{{ $results->currentPage() + 1 }}</a>
                    <a href="{{ $results->nextPageUrl() }}" class="admin-member-main-page-next">次へ＞</a>
                @else
                    <span class="admin-member-main-page-right-off"></span>
                @endif
            </div>
        @endif
        <div class="product-list-button">
            <a href="{{ route('top') }}" class="button-product-list">トップに戻る</a>
        </div>
    </div>
</body>
</html>