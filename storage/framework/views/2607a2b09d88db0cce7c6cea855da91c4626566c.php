<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品登録確認画面</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <div id="head">
        <p>商品登録確認画面</p>
    </div>
    <div id="product-register-content">
        <div class="product-check">
            <span class="product-check-left">商品名</span>
            <span class="product-check-right"><?php echo e($product['name']); ?></span>
        </div>
        <br>
        <div class="product-check">
            <span class="product-check-left">商品カテゴリ</span>
            <span class="product-check-right">
                <?php $__currentLoopData = config('master.category'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($product['category'] == $index): ?> <?php echo e($value); ?> <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ＞
                <?php $__currentLoopData = config('master.subcategory'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($product['subcategory'] == $index): ?> <?php echo e($value); ?> <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </span>
        </div>
        <br>
        <div class="product-check">
            <span class="product-check-left">商品写真</span>
            <div class="product-check-right">
                <span>写真１</span>
                <?php if($product['product-register-image-1']): ?>
                    <div class="product-register-image-box-1">
                        <img src="<?php echo e(asset('images/' . $product['product-register-image-1'])); ?>" class="product-register-image-1">
                    </div>
                <?php endif; ?>
                <br>
                <span>写真２</span>
                <?php if($product['product-register-image-2']): ?>
                    <div class="product-register-image-box-2">
                        <img src="<?php echo e(asset('images/' . $product['product-register-image-2'])); ?>" class="product-register-image-2">
                    </div>
                <?php endif; ?>
                <br>
                <span>写真３</span>
                <?php if($product['product-register-image-3']): ?>
                    <div class="product-register-image-box-3">
                        <img src="<?php echo e(asset('images/' . $product['product-register-image-3'])); ?>" class="product-register-image-3">
                    </div>
                <?php endif; ?>
                <br>
                <span>写真４</span>
                <?php if($product['product-register-image-4']): ?>
                    <div class="product-register-image-box-4">
                        <img src="<?php echo e(asset('images/' . $product['product-register-image-4'])); ?>" class="product-register-image-4">
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <br>
        <div class="product-check">
            <span class="product-check-left">商品説明</span>
            <span class="product-check-right"><?php echo nl2br(e($product['explanation'])); ?></span>
        </div>
        <br>
        <form action="<?php echo e(route('product.store')); ?>" method="POST">
            <div class="button-register-product">
                <?php echo csrf_field(); ?>
                <input type="submit" value="商品を登録する" class="button-check-product-1">
                <br>
                <input type="hidden" name="topOrList" value="<?php echo e($product['topOrList']); ?>">
                <input type="submit" value="前に戻る" name="back" class="button-check-product-2">    
            </div>
        </form>
    </div>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/laravelbbs/resources/views/product/check.blade.php ENDPATH**/ ?>