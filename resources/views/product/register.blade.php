<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script type="text/javascript">
        $(function() {
            // categoryが変更された場合
            $('.category').change(function() {
                var category_val = $(this).val();

                // category_valの値をselect.phpへ渡す
                $.ajax({
                    url: "{{ route('product.register.fetch') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        category_id: category_val
                    }
                })
                .done(function(data) {
                    // // subcategoryのoption値を一旦削除
                    // $('.subcategory option').remove();

                    // // select.phpから戻ってきたdataの値をそれぞれoptionタグとして生成し、subcategoryにoptionタグを追加する
                    // $.each(data, function(id, name) {
                    //     $('.subcategory').append($('<option>').text(name).attr('value', id));
                    // })
                })
                .fail(function() {
                    console.log("失敗");
                })
            })
        })
    </script>
    <title>商品登録フォーム</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div id="head">
        <p>商品登録</p>
    </div>
    <div id="product-register-content">
        <form action="{{ route('product.check') }}" method="POST">
            @csrf
            <div class="product-register-name">
                <span>商品名</span>
                <input type="text" name="name" size="55" maxlength="255" value="{{ old('name') }}">    
            </div>
            <br>
            <div class="product-register-category">
                <span>商品カテゴリ</span>
                <select name="category" class="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach    
                </select>
                <select name="subcategory" class="subcategory">
                    <option class="">選択して下さい</option>
                </select>
            </div>
        </form>
    </div>
</body>
</html>