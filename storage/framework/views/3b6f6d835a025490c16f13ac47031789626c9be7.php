<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品レビュー登録確認画面</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <div id="top-head-2">
        <span class="product-list-title">商品レビュー登録確認画面</span>
        <div>
            <a href="<?php echo e(route('top')); ?>" class="button-top-right-1">トップに戻る</a>
        </div>
    </div>
    <div class="review-register">
        <div class="review-register-content">
            <img src="<?php echo e(asset('images/' . $product->image_1)); ?>" class="review-register-image">
            <div>
                <p><?php echo e($product->name); ?></p>
                <span>総合評価</span>
                <?php if($data['star'] == 0): ?>
                    <span>　</span>
                <?php endif; ?>
                <?php if($data['star'] == 1): ?>
                    <span>　★</span>
                <?php endif; ?>
                <?php if($data['star'] == 2): ?>
                    <span>　★★</span>
                <?php endif; ?>
                <?php if($data['star'] == 3): ?>
                    <span>　★★★</span>
                <?php endif; ?>
                <?php if($data['star'] == 4): ?>
                    <span>　★★★★</span>
                <?php endif; ?>
                <?php if($data['star'] == 5): ?>
                    <span>　★★★★★</span>
                <?php endif; ?>
                <span><?php echo e($data['star']); ?></span>        
            </div>    
        </div>
        <div class="review-register-review">
            <div class="review-register-review-left">
                <span>商品評価</span>
            </div>
            <div class="review-register-review-right">
                <span><?php echo e($data['evaluation']); ?></span>
            </div>
        </div>
        <div class="review-register-review">
            <div class="review-register-review-left">
                <span>商品コメント</span>
            </div>
            <div class="review-register-review-right">
                <span><?php echo nl2br(e($data['comment'])); ?></span>
            </div>
        </div>
        <form action="<?php echo e(route('review.store')); ?>" method="POST">
            <div class="review-check-button">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="page" value="<?php echo e($data['page']); ?>">
                <input type="hidden" name="product_id" value="<?php echo e($data['product_id']); ?>">
                <input type="hidden" name="evaluation" value="<?php echo e($data['evaluation']); ?>">
                <input type="hidden" name="comment" value="<?php echo e($data['comment']); ?>">
                <input type="submit" value="登録する" class="button-review-check-1">
                <br>
                <input type="submit" value="前に戻る" name="back" class="button-review-check-2">    
            </div>
        </form>
    </div>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/laravelbbs/resources/views/review/check.blade.php ENDPATH**/ ?>