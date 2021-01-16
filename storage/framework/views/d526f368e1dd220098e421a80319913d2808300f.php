<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>マイページ</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <div id="top-head-2">
        <span class="product-list-title">マイページ</span>
        <div>
            <a href="<?php echo e(route('top')); ?>" class="button-top-center-2">トップに戻る</a>
            <a href="<?php echo e(route('logout')); ?>" class="button-top-right-2">ログアウト</a>
        </div>
    </div>
    <div class="mypage-index-member">
        <div class="mypage-index-member-left">
            <span>氏名</span>
        </div>
        <div>
            <span><?php echo e(Auth::user()->name_sei); ?>　<?php echo e(Auth::user()->name_mei); ?></span>
        </div>
    </div>
    <div class="mypage-index-member">
        <div class="mypage-index-member-left">
            <span>ニックネーム</span>
        </div>
        <div>
            <span><?php echo e(Auth::user()->nickname); ?></span>
        </div>
    </div>
    <div class="mypage-index-member">
        <div class="mypage-index-member-left">
            <span>性別</span>
        </div>
        <div>
            <span>
                <?php $__currentLoopData = config('master.gender'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(Auth::user()->gender == $index): ?> <?php echo e($value); ?> <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </span>
        </div>
    </div>
    <div class="mypage-index-button-information">
        <a href="<?php echo e(route('mypage.edit.information')); ?>" class="mypage-index-delete-button-information">会員情報変更</a>
    </div>
    <div class="mypage-index-member">
        <div class="mypage-index-member-left">
            <span>パスワード</span>
        </div>
        <div>
            <span>セキュリティのため非表示</span>
        </div>
    </div>
    <div class="mypage-index-button-password">
        <a href="<?php echo e(route('mypage.edit.password')); ?>" class="mypage-index-delete-button-password">パスワード変更</a>
    </div>
    <div class="mypage-index-member">
        <div class="mypage-index-member-left">
            <span>メールアドレス</span>
        </div>
        <div>
            <span><?php echo e(Auth::user()->email); ?></span>
        </div>
    </div>
    <div class="mypage-index-button-email">
        <a href="<?php echo e(route('mypage.edit.email')); ?>" class="mypage-index-delete-button-email">メールアドレス変更</a>
    </div>
    <div class="mypage-index-button-review">
        <a href="<?php echo e(route('mypage.review.list')); ?>" class="mypage-index-delete-button-review">商品レビュー管理</a>
    </div>
    <div class="mypage-index-button">
        <a href="<?php echo e(route('mypage.confirm')); ?>" class="mypage-index-delete-button">退会</a>
    </div>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/laravelbbs/resources/views/mypage/index.blade.php ENDPATH**/ ?>