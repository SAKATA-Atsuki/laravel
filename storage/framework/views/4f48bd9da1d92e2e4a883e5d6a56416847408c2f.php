<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品詳細</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <div id="top-head-2">
        <span class="product-list-title">商品詳細</span>
        <div>
            <a href="<?php echo e(route('top')); ?>" class="button-top-right-1">トップに戻る</a>
        </div>
    </div>
    <br>
    <div class="product-detail">
        <p>
            <?php $__currentLoopData = config('master.category'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($product->product_category_id == $index): ?> <?php echo e($value); ?> <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ＞
            <?php $__currentLoopData = config('master.subcategory'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($product->product_subcategory_id == $index): ?> <?php echo e($value); ?> <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </p>
        <span class="product-detail-name"><?php echo e($product->name); ?></span>
        <span>更新日時：<?php echo e($product->updated_at); ?></span>
        <div class="product-detail-images">
            <?php if($product->image_1): ?>
                <img src="<?php echo e(asset('images/' . $product->image_1)); ?>" class="product-detail-image">
            <?php endif; ?>
            <?php if($product->image_2): ?>
                <img src="<?php echo e(asset('images/' . $product->image_2)); ?>" class="product-detail-image">
            <?php endif; ?>
            <?php if($product->image_3): ?>
                <img src="<?php echo e(asset('images/' . $product->image_3)); ?>" class="product-detail-image">
            <?php endif; ?>
            <?php if($product->image_4): ?>
                <img src="<?php echo e(asset('images/' . $product->image_4)); ?>" class="product-detail-image">
            <?php endif; ?>
        </div>
        <p>■商品説明</p>
        <p><?php echo nl2br(e($product->product_content)); ?></p>
        <br>
        <p>■商品レビュー</p>
        <span>総合評価</span>
        <?php if($star == 0): ?>
            <span>　</span>
        <?php endif; ?>
        <?php if($star == 1): ?>
            <span>　★</span>
        <?php endif; ?>
        <?php if($star == 2): ?>
            <span>　★★</span>
        <?php endif; ?>
        <?php if($star == 3): ?>
            <span>　★★★</span>
        <?php endif; ?>
        <?php if($star == 4): ?>
            <span>　★★★★</span>
        <?php endif; ?>
        <?php if($star == 5): ?>
            <span>　★★★★★</span>
        <?php endif; ?>
        <span><?php echo e($star); ?></span>
        <br><br>
        <a href="<?php echo e(route('review.list', ['pg' => $page, 'id' => $product->id])); ?>" class="product-detail-to-review">＞＞レビューを見る</a>
        <br><br>
        <?php if(Auth::check()): ?>
            <div class="product-detail-button">
                <a href="<?php echo e(route('review.register', ['page' => $page, 'id' => $product->id])); ?>" class="button-product-detail-1">この商品についてのレビューを登録</a>
            </div>
        <?php endif; ?>
        <div class="product-detail-button">
            <a href="<?php echo e(route('product.list', ['page' => $page])); ?>" class="button-product-detail-2">商品一覧に戻る</a>
        </div>
    </div>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/laravelbbs/resources/views/product/detail.blade.php ENDPATH**/ ?>