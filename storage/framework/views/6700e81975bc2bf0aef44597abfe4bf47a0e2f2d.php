<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品レビュー削除確認画面</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <div id="top-head-2">
        <span class="product-list-title">商品レビュー削除確認</span>
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
            </div>    
        </div>
        <div class="review-register-review">
            <div class="review-register-review-left">
                <span>商品評価</span>
            </div>
            <div class="review-register-review-right">
                <span><?php echo e($review->evaluation); ?></span>
            </div>
        </div>
        <div class="review-register-review">
            <div class="review-register-review-left">
                <span>商品コメント</span>
            </div>
            <div class="review-register-review-right">
                <span><?php echo nl2br(e($review->comment)); ?></span>
            </div>
        </div>
        <form action="<?php echo e(route('mypage.review.delete')); ?>" method="POST">
            <div class="review-check-button">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="page" value="<?php echo e($page); ?>">
                <input type="hidden" name="review_id" value="<?php echo e($review->id); ?>">
                <input type="submit" value="レビューを削除する" class="button-mypage-review-delete">
                <br>
                <input type="submit" value="前に戻る" name="back" class="button-review-check-2">    
            </div>
        </form>
    </div>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/laravelbbs/resources/views/mypage/review/delete.blade.php ENDPATH**/ ?>