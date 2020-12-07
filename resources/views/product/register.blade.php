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
                var category_id = $(this).val();
                var _token = $('input[name="_token"]').val();

                // category_idの値を渡す
                $.ajax({
                    url: "{{ route('product.register.category') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        category_id: category_id,
                        _token: _token
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

            // 画像がアップロードされた場合
            $('.product-register-image-upload').change(function(e) {
                // 画像を表示させる処理
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#product-register-image-box-1').empty();
                    $('#product-register-image-box-1').append($('<div>').addClass('product-register-image-box-1'));
                    $('.product-register-image-box-1').append($('<img>').attr('src', e.target.result).addClass('product-register-image-1'));
                }
                reader.readAsDataURL(e.target.files[0]);

                // type="hidden"のinputタグに、画像の情報を入れる処理
                var name = $(this).val();
                var _token = $('input[name="_token"]').val();

                // 
                $.ajax({
                    url: "{{ route('product.register.image') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        name: name,
                        url: e.target.result,
                        _token: _token
                    }
                })
                .done(function(data) {
                    $('#product-register-image-1').attr('value', data)
                    console.log("成功");
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
        <form action="{{ route('product.check') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="product-register-name">
                <span>商品名</span>
                <input type="text" name="name" size="55" maxlength="255" value="{{ old('name') }}">    
            </div>
            <br>
            <div>
                <span>商品カテゴリ</span>
                <select name="category" class="category">
                    <option value="0">----------------</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach    
                </select>
                <select name="subcategory" class="subcategory">
                    <option class="">----------------</option>
                </select>
            </div>
            <br>
            <div>
                <span>商品写真</span>
                <div class="product-register-image">
                    <span>写真１</span><br>
                    <input type="hidden" id="product-register-image-1">
                    <div id="product-register-image-box-1"></div>
                    <div style="text-align: center;">
                        <label for="product-register-image-upload-1">
                            <input type="file" id="product-register-image-upload-1" class="product-register-image-upload">アップロード
                        </label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>