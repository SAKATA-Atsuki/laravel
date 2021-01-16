<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品レビュー管理</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <div id="top-head-2">
        <span class="product-list-title">商品レビュー管理</span>
        <div>
            <a href="<?php echo e(route('top')); ?>" class="button-top-right-1">トップに戻る</a>
        </div>
    </div>
    <div class="mypage-review-list">
        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="product-list-bar"></div>
            <div class="product-list">
                <img src="<?php echo e(asset('images/' . $review->getImage1())); ?>" class="product-list-image">
                <div class="product-list-right">
                    <span class="product-list-category">
                        <?php $__currentLoopData = config('master.category'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($review->getProductCategoryId() == $index): ?> <?php echo e($value); ?> <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ＞
                        <?php $__currentLoopData = config('master.subcategory'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($review->getSubProductCategoryId() == $index): ?> <?php echo e($value); ?> <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </span>
                    <br><br>
                    <span class="button-product-list-to-detail-1"><?php echo e($review->getName()); ?></span>
                    <div class="product-list-star">
                        <?php if($review->evaluation == 0): ?>
                            <span><?php echo e($review->evaluation); ?></span>
                        <?php endif; ?>
                        <?php if($review->evaluation == 1): ?>
                            <span>★ <?php echo e($review->evaluation); ?></span>
                        <?php endif; ?>
                        <?php if($review->evaluation == 2): ?>
                            <span>★★ <?php echo e($review->evaluation); ?></span>
                        <?php endif; ?>
                        <?php if($review->evaluation == 3): ?>
                            <span>★★★ <?php echo e($review->evaluation); ?></span>
                        <?php endif; ?>
                        <?php if($review->evaluation == 4): ?>
                            <span>★★★★ <?php echo e($review->evaluation); ?></span>
                        <?php endif; ?>
                        <?php if($review->evaluation == 5): ?>
                            <span>★★★★★ <?php echo e($review->evaluation); ?></span>
                        <?php endif; ?>
                        <br>
                        <?php if(mb_strlen($review->comment) > 15): ?>
                            <span><?php echo e(mb_substr($review->comment, 0, 15)); ?>…</span>
                        <?php else: ?>
                            <span><?php echo e($review->comment); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="button-mypage-review-list">
                        <a href="<?php echo e(route('mypage.review.edit', ['page' => $page, 'review_id' => $review->id, 'product_id' => $review->product_id])); ?>" class="button-mypage-review-list-1">レビュー編集</a>
                        <a href="<?php echo e(route('mypage.review.delete', ['page' => $page, 'review_id' => $review->id, 'product_id' => $review->product_id])); ?>" class="button-mypage-review-list-1">レビュー削除</a>
                    </div>            
                </div>    
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if(count($reviews)): ?>
            <div class="product-list-page">
                <?php if($reviews->onFirstPage()): ?>
                    <span class="admin-member-main-page-left-off"></span>
                <?php else: ?>
                    <a href="<?php echo e($reviews->previousPageUrl()); ?>" class="admin-member-main-page-prev">前へ＞</a>
                    <a href="<?php echo e($reviews->previousPageUrl()); ?>" class="admin-member-main-page-left-on"><?php echo e($reviews->currentPage() - 1); ?></a>
                <?php endif; ?>
                <span class="admin-member-main-page-center"><?php echo e($reviews->currentPage()); ?></span>
                <?php if($reviews->hasMorePages()): ?>
                    <a href="<?php echo e($reviews->nextPageUrl()); ?>" class="admin-member-main-page-right-on"><?php echo e($reviews->currentPage() + 1); ?></a>
                    <a href="<?php echo e($reviews->nextPageUrl()); ?>" class="admin-member-main-page-next">次へ＞</a>
                <?php else: ?>
                    <span class="admin-member-main-page-right-off"></span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="mypage-review-list-button">
            <a href="<?php echo e(route('mypage')); ?>" class="mypage-review-list-button-1">マイページに戻る</a>    
        </div>
    </div>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/laravelbbs/resources/views/mypage/review/list.blade.php ENDPATH**/ ?>