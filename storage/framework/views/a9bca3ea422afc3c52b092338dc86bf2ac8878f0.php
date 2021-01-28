<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品レビュー一覧</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <div id="top-head-2">
        <span class="product-list-title">商品レビュー一覧</span>
        <div>
            <a href="<?php echo e(route('top')); ?>" class="button-top-right-1">トップに戻る</a>
        </div>
    </div>
    <div class="review-register">
        <div class="review-list-content">
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
        <?php if(count($results)): ?>
            <div class="review-list-results">
                <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="review-list-result">
                        <div class="review-list-result-content">
                            <div class="review-list-result-left">
                                <span class="review-list-result-name"><?php echo e($result->getMemberNickname()); ?>さん</span>
                            </div>
                            <div class="review-list-result-center">
                                <?php if($result->evaluation == 1): ?>
                                    <span>★</span>
                                <?php endif; ?>
                                <?php if($result->evaluation == 2): ?>
                                    <span>★★</span>
                                <?php endif; ?>
                                <?php if($result->evaluation == 3): ?>
                                    <span>★★★</span>
                                <?php endif; ?>
                                <?php if($result->evaluation == 4): ?>
                                    <span>★★★★</span>
                                <?php endif; ?>
                                <?php if($result->evaluation == 5): ?>
                                    <span>★★★★★</span>
                                <?php endif; ?>        
                            </div>
                            <div>
                                <span><?php echo e($result->evaluation); ?></span>
                            </div>
                        </div>
                        <div class="review-list-result-content">
                            <div class="review-list-result-left">
                                <span class="review-list-result-name">商品コメント</span>
                            </div>
                            <div>
                                <span><?php echo nl2br(e($result->comment)); ?></span>
                            </div>
                        </div>    
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="review-list-page">
                <?php if($results->onFirstPage()): ?>
                    <span class="admin-member-main-page-left-off"></span>
                <?php else: ?>
                    <a href="<?php echo e($results->previousPageUrl()); ?>" class="admin-member-main-page-prev">前へ＞</a>
                    <a href="<?php echo e($results->previousPageUrl()); ?>" class="admin-member-main-page-left-on"><?php echo e($results->currentPage() - 1); ?></a>
                <?php endif; ?>
                <span class="admin-member-main-page-center"><?php echo e($results->currentPage()); ?></span>
                <?php if($results->hasMorePages()): ?>
                    <a href="<?php echo e($results->nextPageUrl()); ?>" class="admin-member-main-page-right-on"><?php echo e($results->currentPage() + 1); ?></a>
                    <a href="<?php echo e($results->nextPageUrl()); ?>" class="admin-member-main-page-next">次へ＞</a>
                <?php else: ?>
                    <span class="admin-member-main-page-right-off"></span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="review-list-button">
            <a href="<?php echo e(route('product.detail', ['page' => $pg, 'id' => $product->id])); ?>" class="button-review-complete-2">商品詳細に戻る</a>
        </div>
    </div>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/laravelbbs/resources/views/review/list.blade.php ENDPATH**/ ?>