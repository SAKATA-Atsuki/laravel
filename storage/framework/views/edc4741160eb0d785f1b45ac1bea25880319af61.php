<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品レビュー編集</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <div id="top-head-2">
        <span class="product-list-title">商品レビュー編集</span>
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
        <form action="<?php echo e(route('mypage.review.check')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="review-register-review">
                <div class="review-register-review-left">
                    <span>商品評価</span>
                </div>
                <div class="review-register-review-right">
                    <select name="evaluation" class="review-register-evaluation">
                        <?php if(old('evaluation')): ?>
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <option value="<?php echo e($i); ?>" <?php if(old('evaluation') == $i): ?> selected <?php endif; ?>><?php echo e($i); ?></option>
                            <?php endfor; ?>
                        <?php else: ?>
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <option value="<?php echo e($i); ?>" <?php if($review->evaluation == $i): ?> selected <?php endif; ?>><?php echo e($i); ?></option>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <?php $__errorArgs = ['evaluation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div class="review-register-review">
                <div class="review-register-review-left">
                    <span>商品コメント</span>
                </div>
                <div class="review-register-review-right">
                    <textarea name="comment" cols="40" rows="6"><?php if(old('comment')): ?><?php echo e(old('comment')); ?><?php else: ?><?php echo e($review->comment); ?><?php endif; ?></textarea>
                </div>
            </div>
            <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div class="review-register-button">
                <input type="hidden" name="page" value="<?php echo e($page); ?>">
                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                <input type="hidden" name="star" value="<?php echo e($star); ?>">
                <input type="hidden" name="review_id" value="<?php echo e($review->id); ?>">
                <input type="submit" value="商品レビュー編集確認" class="button-review-register-1">
                <br>
                <a href="<?php echo e(route('mypage.review.list', ['page' => $page])); ?>" class="button-mypage-review-edit">レビュー管理に戻る</a>
            </div>
        </form>
    </div>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/laravelbbs/resources/views/mypage/review/edit.blade.php ENDPATH**/ ?>