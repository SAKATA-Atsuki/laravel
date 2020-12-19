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

            // 写真１に画像がアップロードされた場合
            $('#product-register-image-upload-1').change(function(e) {
                var formData = new FormData($('#product-register-form').get(0));

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    url: "<?php echo e(route('product.register.image1')); ?>",
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
                    url: "<?php echo e(route('product.register.image2')); ?>",
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
                    url: "<?php echo e(route('product.register.image3')); ?>",
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
                    url: "<?php echo e(route('product.register.image4')); ?>",
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
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <br>
            <div>
                <span>商品カテゴリ</span>
                <select name="category" class="category">
                    <option value="0">----------------</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php if(old('category') == $category->id): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                </select>
                <select name="subcategory" class="subcategory">
                    <?php if(old('subcategory') == 0): ?>
                        <option value="0">----------------</option>
                    <?php endif; ?>
                    <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if((old('category') - 1) * 5 + 1 <= $subcategory->id && $subcategory->id <= (old('category') - 1) * 5 + 5): ?>
                            <option value="<?php echo e($subcategory->id); ?>" <?php if(old('subcategory') == $subcategory->id): ?> selected <?php endif; ?>><?php echo e($subcategory->name); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                </select>
            </div>
            <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <br>
            <div>
                <span>商品写真</span>
                <div class="product-register-image">
                    <span>写真１</span><br>
                    <input type="hidden" name="product-register-image-1" id="product-register-image-1" <?php if(old('product-register-image-1')): ?> value="<?php echo e(old('product-register-image-1')); ?>" <?php endif; ?>>
                    <div id="product-register-image-box-1">
                        <?php if(old('product-register-image-1')): ?>
                            <div class="product-register-image-box-1">
                                <img src="<?php echo e(asset('images/' . old('product-register-image-1'))); ?>" class="product-register-image-1">
                            </div>
                        <?php endif; ?>
                    </div>
                    <br>
                    <div style="text-align: center;">
                        <label for="product-register-image-upload-1">
                            <input type="file" id="product-register-image-upload-1" name="product-register-image-upload-1" class="product-register-image-upload">アップロード
                        </label>
                    </div>
                    <br>
                    <span>写真２</span><br>
                    <input type="hidden" name="product-register-image-2" id="product-register-image-2" <?php if(old('product-register-image-2')): ?> value="<?php echo e(old('product-register-image-2')); ?>" <?php endif; ?>>
                    <div id="product-register-image-box-2">
                        <?php if(old('product-register-image-2')): ?>
                            <div class="product-register-image-box-2">
                                <img src="<?php echo e(asset('images/' . old('product-register-image-2'))); ?>" class="product-register-image-2">
                            </div>
                        <?php endif; ?>
                    </div>
                    <br>
                    <div style="text-align: center;">
                        <label for="product-register-image-upload-2">
                            <input type="file" id="product-register-image-upload-2" name="product-register-image-upload-2" class="product-register-image-upload">アップロード
                        </label>
                    </div>
                    <br>
                    <span>写真３</span><br>
                    <input type="hidden" name="product-register-image-3" id="product-register-image-3" <?php if(old('product-register-image-3')): ?> value="<?php echo e(old('product-register-image-3')); ?>" <?php endif; ?>>
                    <div id="product-register-image-box-3">
                        <?php if(old('product-register-image-3')): ?>
                            <div class="product-register-image-box-3">
                                <img src="<?php echo e(asset('images/' . old('product-register-image-3'))); ?>" class="product-register-image-3">
                            </div>
                        <?php endif; ?>
                    </div>
                    <br>
                    <div style="text-align: center;">
                        <label for="product-register-image-upload-3">
                            <input type="file" id="product-register-image-upload-3" name="product-register-image-upload-3" class="product-register-image-upload">アップロード
                        </label>
                    </div>
                    <br>
                    <span>写真４</span><br>
                    <input type="hidden" name="product-register-image-4" id="product-register-image-4" <?php if(old('product-register-image-4')): ?> value="<?php echo e(old('product-register-image-4')); ?>" <?php endif; ?>>
                    <div id="product-register-image-box-4">
                        <?php if(old('product-register-image-4')): ?>
                            <div class="product-register-image-box-4">
                                <img src="<?php echo e(asset('images/' . old('product-register-image-4'))); ?>" class="product-register-image-4">
                            </div>
                        <?php endif; ?>
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
                <textarea name="explanation" id="explanation" cols="50" rows="8" class="product-register-explanation"><?php echo e(old('explanation')); ?></textarea>
            </div>
            <?php $__errorArgs = ['explanation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div class="button-register-product">
                <input type="submit" value="確認画面へ" class="button-register-product-1">
                <br>
                <?php if($topOrList): ?>
                    <a href="<?php echo e(route('product.list')); ?>" class="button-register-product-2">商品一覧に戻る</a>
                <?php else: ?>
                    <a href="<?php echo e(route('top')); ?>" class="button-register-product-3">トップに戻る</a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/laravelbbs/resources/views/product/register.blade.php ENDPATH**/ ?>