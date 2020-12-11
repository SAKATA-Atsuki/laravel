<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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
                    url: "<?php echo e(route('product.register.category')); ?>",
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

            // 画像がアップロードされた場合
            $('#product-register-image-upload-1').change(function(e) {
                var formData = new FormData($('#product-register-form').get(0));

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    url: "<?php echo e(route('product.register.image')); ?>",
                    type: "POST",
                    processData: false,
                    data: {
                        formData: formData
                    }
                })
                .done(function(data) {
                    // 画像を表示させる処理
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#product-register-image-box-1').empty();
                        $('#product-register-image-box-1').append($('<div>').addClass('product-register-image-box-1'));
                        $('.product-register-image-box-1').append($('<img>').attr('src', e.target.result).addClass('product-register-image-1'));

                        $('#product-register-image-box-1').append($('<input>').attr('value', data));
                    }
                    reader.readAsDataURL(e.target.files[0]);

                    // hidden属性のinputタグに画像の名前を入れる
                    $('#product-register-image-1').attr('value', data);
                })
                .fail(function() {
                    console.log("失敗");
                })

            })
        })
    </script>
    <title>商品登録フォーム</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <div id="head">
        <p>商品登録</p>
    </div>
    <div id="product-register-content">
        <form action="<?php echo e(route('product.check')); ?>" method="POST" enctype="multipart/form-data" id="product-register-form">
            <?php echo csrf_field(); ?>
            <div class="product-register-name">
                <span>商品名</span>
                <input type="text" name="name" size="55" maxlength="255" value="<?php echo e(old('name')); ?>">    
            </div>
            <br>
            <div>
                <span>商品カテゴリ</span>
                <select name="category" class="category">
                    <option value="0">----------------</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
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
                            <input type="file" id="product-register-image-upload-1" name="product-register-image-upload-1" class="product-register-image-upload">アップロード
                        </label>
                    </div>
                </div>
            </div>
            <div>
                <span>商品説明</span><br>
                <textarea name="explanation" id="explanation" cols="40" rows="6" class="product-register-explanation"></textarea>
            </div>
            <div class="button-register-product">
                <input type="submit" value="確認画面へ" class="button-register-product-1">
                <br>
                <a href="<?php echo e(route('top')); ?>" class="button-register-product-2">トップに戻る</a>    
            </div>
        </form>
    </div>
</body>
</html><?php /**PATH /var/www/laravel/laravelbbs/resources/views/product/register.blade.php ENDPATH**/ ?>