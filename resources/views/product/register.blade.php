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

            // 写真１に画像がアップロードされた場合
            $('#product-register-image-upload-1').change(function(e) {
                var formData = new FormData($('#product-register-form').get(0));

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    url: "{{ route('product.register.image1') }}",
                    type: "POST",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "html"
                })
                .done(function(data) {
                    if (data == 'file') {
                        $('#product-register-image-box-1').empty();
                        $('#product-register-image-box-1').append($('<p>※jpg, jpeg, png, gifのみ<br>　アップロード可能です</p>').addClass('error'));
                    } else if (data == 'size') {
                        $('#product-register-image-box-1').empty();
                        $('#product-register-image-box-1').append($('<p>※アップロードできるファイルは<br>　10MBまでです</p>').addClass('error'));
                    } else {
                        // 画像を表示させる処理
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#product-register-image-box-1').empty();
                            $('#product-register-image-box-1').append($('<div>').addClass('product-register-image-box-1'));
                            $('.product-register-image-box-1').append($('<img>').attr('src', e.target.result).addClass('product-register-image-1'));
                        }
                        reader.readAsDataURL(e.target.files[0]);

                        // hidden属性のinputタグに画像の名前を入れる
                        $('#product-register-image-1').attr('value', data);
                    }
                })
                .fail(function() {
                    console.log("失敗");
                })
            })

            // 写真２に画像がアップロードされた場合
            $('#product-register-image-upload-2').change(function(e) {
                var formData = new FormData($('#product-register-form').get(0));

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    url: "{{ route('product.register.image2') }}",
                    type: "POST",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "html"
                })
                .done(function(data) {
                    if (data == 'file') {
                        $('#product-register-image-box-2').empty();
                        $('#product-register-image-box-2').append($('<p>※jpg, jpeg, png, gifのみ<br>　アップロード可能です</p>').addClass('error'));
                    } else if (data == 'size') {
                        $('#product-register-image-box-2').empty();
                        $('#product-register-image-box-2').append($('<p>※アップロードできるファイルは<br>　10MBまでです</p>').addClass('error'));
                    } else {
                        // 画像を表示させる処理
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#product-register-image-box-2').empty();
                            $('#product-register-image-box-2').append($('<div>').addClass('product-register-image-box-2'));
                            $('.product-register-image-box-2').append($('<img>').attr('src', e.target.result).addClass('product-register-image-2'));
                        }
                        reader.readAsDataURL(e.target.files[0]);

                        // hidden属性のinputタグに画像の名前を入れる
                        $('#product-register-image-2').attr('value', data);
                    }
                })
                .fail(function() {
                    console.log("失敗");
                })
            })

            // 写真３に画像がアップロードされた場合
            $('#product-register-image-upload-3').change(function(e) {
                var formData = new FormData($('#product-register-form').get(0));

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    url: "{{ route('product.register.image3') }}",
                    type: "POST",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "html"
                })
                .done(function(data) {
                    if (data == 'file') {
                        $('#product-register-image-box-3').empty();
                        $('#product-register-image-box-3').append($('<p>※jpg, jpeg, png, gifのみ<br>　アップロード可能です</p>').addClass('error'));
                    } else if (data == 'size') {
                        $('#product-register-image-box-3').empty();
                        $('#product-register-image-box-3').append($('<p>※アップロードできるファイルは<br>　10MBまでです</p>').addClass('error'));
                    } else {
                        // 画像を表示させる処理
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#product-register-image-box-3').empty();
                            $('#product-register-image-box-3').append($('<div>').addClass('product-register-image-box-3'));
                            $('.product-register-image-box-3').append($('<img>').attr('src', e.target.result).addClass('product-register-image-3'));
                        }
                        reader.readAsDataURL(e.target.files[0]);

                        // hidden属性のinputタグに画像の名前を入れる
                        $('#product-register-image-3').attr('value', data);
                    }
                })
                .fail(function() {
                    console.log("失敗");
                })
            })

            // 写真４に画像がアップロードされた場合
            $('#product-register-image-upload-4').change(function(e) {
                var formData = new FormData($('#product-register-form').get(0));

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    url: "{{ route('product.register.image4') }}",
                    type: "POST",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "html"
                })
                .done(function(data) {
                    if (data == 'file') {
                        $('#product-register-image-box-4').empty();
                        $('#product-register-image-box-4').append($('<p>※jpg, jpeg, png, gifのみ<br>　アップロード可能です</p>').addClass('error'));
                    } else if (data == 'size') {
                        $('#product-register-image-box-4').empty();
                        $('#product-register-image-box-4').append($('<p>※アップロードできるファイルは<br>　10MBまでです</p>').addClass('error'));
                    } else {
                        // 画像を表示させる処理
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#product-register-image-box-4').empty();
                            $('#product-register-image-box-4').append($('<div>').addClass('product-register-image-box-4'));
                            $('.product-register-image-box-4').append($('<img>').attr('src', e.target.result).addClass('product-register-image-4'));
                        }
                        reader.readAsDataURL(e.target.files[0]);

                        // hidden属性のinputタグに画像の名前を入れる
                        $('#product-register-image-4').attr('value', data);
                    }
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
        <form action="{{ route('product.check') }}" method="POST" enctype="multipart/form-data" id="product-register-form">
            @csrf
            <div class="product-register-name">
                <span>商品名</span>
                <input type="text" name="name" size="55" maxlength="255" value="{{ old('name') }}">    
            </div>
            @error('name')
                <p class="error">{{ $message }}</p>
            @enderror
            <br>
            <div>
                <span>商品カテゴリ</span>
                <select name="category" class="category">
                    <option value="0">----------------</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (old('category') == $category->id) selected @endif>{{ $category->name }}</option>
                    @endforeach    
                </select>
                <select name="subcategory" class="subcategory">
                    @if (old('subcategory') == 0)
                        <option value="0">----------------</option>
                    @endif
                    @foreach ($subcategories as $subcategory)
                        @if ((old('category') - 1) * 5 + 1 <= $subcategory->id && $subcategory->id <= (old('category') - 1) * 5 + 5)
                            <option value="{{ $subcategory->id }}" @if (old('subcategory') == $subcategory->id) selected @endif>{{ $subcategory->name }}</option>
                        @endif
                    @endforeach    
                </select>
            </div>
            @error('category')
                <p class="error">{{ $message }}</p>
            @enderror
            <br>
            <div>
                <span>商品写真</span>
                <div class="product-register-image">
                    <span>写真１</span><br>
                    <input type="hidden" name="product-register-image-1" id="product-register-image-1" @if (old('product-register-image-1')) value="{{ old('product-register-image-1') }}" @endif>
                    <div id="product-register-image-box-1">
                        @if (old('product-register-image-1'))
                            <div class="product-register-image-box-1">
                                <img src="{{ asset('images/' . old('product-register-image-1')) }}" class="product-register-image-1">
                            </div>
                        @endif
                    </div>
                    <br>
                    <div style="text-align: center;">
                        <label for="product-register-image-upload-1">
                            <input type="file" id="product-register-image-upload-1" name="product-register-image-upload-1" class="product-register-image-upload">アップロード
                        </label>
                    </div>
                    <br>
                    <span>写真２</span><br>
                    <input type="hidden" name="product-register-image-2" id="product-register-image-2" @if (old('product-register-image-2')) value="{{ old('product-register-image-2') }}" @endif>
                    <div id="product-register-image-box-2">
                        @if (old('product-register-image-2'))
                            <div class="product-register-image-box-2">
                                <img src="{{ asset('images/' . old('product-register-image-2')) }}" class="product-register-image-2">
                            </div>
                        @endif
                    </div>
                    <br>
                    <div style="text-align: center;">
                        <label for="product-register-image-upload-2">
                            <input type="file" id="product-register-image-upload-2" name="product-register-image-upload-2" class="product-register-image-upload">アップロード
                        </label>
                    </div>
                    <br>
                    <span>写真３</span><br>
                    <input type="hidden" name="product-register-image-3" id="product-register-image-3" @if (old('product-register-image-3')) value="{{ old('product-register-image-3') }}" @endif>
                    <div id="product-register-image-box-3">
                        @if (old('product-register-image-3'))
                            <div class="product-register-image-box-3">
                                <img src="{{ asset('images/' . old('product-register-image-3')) }}" class="product-register-image-3">
                            </div>
                        @endif
                    </div>
                    <br>
                    <div style="text-align: center;">
                        <label for="product-register-image-upload-3">
                            <input type="file" id="product-register-image-upload-3" name="product-register-image-upload-3" class="product-register-image-upload">アップロード
                        </label>
                    </div>
                    <br>
                    <span>写真４</span><br>
                    <input type="hidden" name="product-register-image-4" id="product-register-image-4" @if (old('product-register-image-4')) value="{{ old('product-register-image-4') }}" @endif>
                    <div id="product-register-image-box-4">
                        @if (old('product-register-image-4'))
                            <div class="product-register-image-box-4">
                                <img src="{{ asset('images/' . old('product-register-image-4')) }}" class="product-register-image-4">
                            </div>
                        @endif
                    </div>
                    <br>
                    <div style="text-align: center;">
                        <label for="product-register-image-upload-4">
                            <input type="file" id="product-register-image-upload-4" name="product-register-image-upload-4" class="product-register-image-upload">アップロード
                        </label>
                    </div>
                    <br>
                </div>
            </div>
            <div>
                <span>商品説明</span><br>
                <textarea name="explanation" id="explanation" cols="50" rows="8" class="product-register-explanation">{{ old('explanation') }}</textarea>
            </div>
            @error('explanation')
                <p class="error">{{ $message }}</p>
            @enderror
            <div class="button-register-product">
                <input type="submit" value="確認画面へ" class="button-register-product-1">
                <br>
                @if ($topOrList)
                    <a href="{{ route('product.list') }}" class="button-register-product-2">商品一覧に戻る</a>
                @else
                    <a href="{{ route('top') }}" class="button-register-product-3">トップに戻る</a>
                @endif
            </div>
        </form>
    </div>
</body>
</html>