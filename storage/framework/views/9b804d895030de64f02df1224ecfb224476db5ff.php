<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>トップページ</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <?php if(Auth::guard('member')->check()): ?>
        <div id="top-head-2">
            <span class="welcome">ようこそ<?php echo e(Auth::guard('member')->user()->name_sei); ?>　<?php echo e(Auth::guard('member')->user()->name_mei); ?>様</span>
            <div>
                <a href="<?php echo e(route('product.list')); ?>" class="button-top-left-2">商品一覧</a>
                <a href="<?php echo e(route('product.register')); ?>" class="button-top-center-2">新規商品登録</a>
                <a href="<?php echo e(route('mypage')); ?>" class="button-top-center-2">マイページ</a>
                <a href="<?php echo e(route('logout')); ?>" class="button-top-right-2">ログアウト</a>
            </div>
        </div>
    <?php else: ?>
        <div id="top-head-1">
            <a href="<?php echo e(route('product.list')); ?>" class="button-top-left-1">商品一覧</a>
            <a href="<?php echo e(route('register')); ?>" class="button-top-center-1">新規会員登録</a>
            <a href="<?php echo e(route('login')); ?>" class="button-top-right-1">ログイン</a>
        </div>
    <?php endif; ?>
</body>
</html><?php /**PATH /var/www/laravel/laravelbbs/resources/views/index.blade.php ENDPATH**/ ?>