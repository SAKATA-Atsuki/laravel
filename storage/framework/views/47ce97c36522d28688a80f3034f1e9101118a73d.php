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
    <div id="top-head-1">
        <div>
            <a href="<?php echo e(route('top')); ?>" class="button-top-center-2">トップに戻る</a>
            <a href="<?php echo e(route('logout')); ?>" class="button-top-right-2">ログアウト</a>
        </div>
    </div>
    <p class="mypage-confirm-message">退会します。よろしいですか？</p>
    <div class="mypage-index-button">
        <a href="<?php echo e(route('mypage')); ?>" class="mypage-confirm-button-1">マイページに戻る</a>
        <br><br><br>
        <a href="<?php echo e(route('mypage.delete')); ?>" class="mypage-confirm-button-2">退会する</a>
    </div>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/laravelbbs/resources/views/mypage/confirm.blade.php ENDPATH**/ ?>