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
    <title>商品編集ページ</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id="admin">
    <div class="admin-index-header">
        <span class="admin-title">商品編集</span>
        <div><a href="{{ route('admin.product') }}" class="admin-register-header-button">一覧へ戻る</a></div>
    </div>
    <div id="admin-product-register-content">
        <form action="{{ route('admin.product.edit') }}" method="POST" enctype="multipart/form-data" id="product-register-form">
            @csrf
            <div>
                <span>ID</span>
                <span style="margin-left: 172px;">{{ $product->id }}</span>
            </div>
            <br>
            <div class="product-register-name">
                <span>商品名</span>
                <input type="text" name="name" size="55" maxlength="255" value="@if(null !== old('name')){{ old('name') }}@else{{ $product->name }}@endif">    
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
                        @if (null !== old('category'))
                            <option value="{{ $category->id }}" @if (old('category') == $category->id) selected @endif>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}" @if ($product->product_category_id == $category->id) selected @endif>{{ $category->name }}</option>
                        @endif
                    @endforeach    
                </select>
                <select name="subcategory" class="subcategory">
                    @foreach ($subcategories as $subcategory)
                        @if (null !== old('subcategory'))
                            <option value="{{ $subcategory->id }}" @if (old('subcategory') == $subcategory->id) selected @endif>{{ $subcategory->name }}</option>
                        @else
                            <option value="{{ $subcategory->id }}" @if ($product->product_subcategory_id == $subcategory->id) selected @endif>{{ $subcategory->name }}</option>
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
                    <input type="hidden" name="product-register-image-1" id="product-register-image-1" value="@if(null !== old('product-register-image-1')){{ old('product-register-image-1') }}@else{{ $product->image_1 }}@endif">
                    <div id="product-register-image-box-1">
                        @if (null !== $product->image_1)
                            <div class="product-register-image-box-1">
                                @if (null !== old('product-register-image-1'))
                                    <img src="{{ asset('images/' . old('product-register-image-1')) }}" class="product-register-image-1">
                                @else
                                    <img src="{{ asset('images/' . $product->image_1) }}" class="product-register-image-1">
                                @endif
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
                    <input type="hidden" name="product-register-image-2" id="product-register-image-2" value="@if(null !== old('product-register-image-2')){{ old('product-register-image-2') }}@else{{ $product->image_2 }}@endif">
                    <div id="product-register-image-box-2">
                        @if (null !== $product->image_2)
                            <div class="product-register-image-box-2">
                                @if (null !== old('product-register-image-2'))
                                    <img src="{{ asset('images/' . old('product-register-image-2')) }}" class="product-register-image-2">
                                @else
                                    <img src="{{ asset('images/' . $product->image_2) }}" class="product-register-image-2">
                                @endif
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
                    <input type="hidden" name="product-register-image-3" id="product-register-image-3" value="@if(null !== old('product-register-image-3')){{ old('product-register-image-3') }}@else{{ $product->image_3 }}@endif">
                    <div id="product-register-image-box-3">
                        @if (null !== $product->image_3)
                            <div class="product-register-image-box-3">
                                @if (null !== old('product-register-image-3'))
                                    <img src="{{ asset('images/' . old('product-register-image-3')) }}" class="product-register-image-3">
                                @else
                                    <img src="{{ asset('images/' . $product->image_3) }}" class="product-register-image-3">
                                @endif
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
                    <input type="hidden" name="product-register-image-4" id="product-register-image-4" value="@if(null !== old('product-register-image-4')){{ old('product-register-image-4') }}@else{{ $product->image_4 }}@endif">
                    <div id="product-register-image-box-4">
                        @if (null !== $product->image_4)
                            <div class="product-register-image-box-4">
                                @if (null !== old('product-register-image-4'))
                                    <img src="{{ asset('images/' . old('product-register-image-4')) }}" class="product-register-image-4">
                                @else
                                    <img src="{{ asset('images/' . $product->image_4) }}" class="product-register-image-4">
                                @endif
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
                <textarea name="explanation" id="explanation" cols="50" rows="8" class="product-register-explanation">@if(null !== old('explanation')){{ old('explanation') }}@else{{ $product->product_content }}@endif</textarea>
            </div>
            @error('explanation')
                <p class="error">{{ $message }}</p>
            @enderror
            <div class="admin-category-register-button">
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="submit" value="確認画面へ" class="button-admin-register">
            </div>
        </form>
    </div>
</body>
</html>