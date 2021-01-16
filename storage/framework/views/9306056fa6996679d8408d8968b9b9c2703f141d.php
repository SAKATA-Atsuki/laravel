<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>会員情報変更確認画面</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <p class="mypage-edit-check-title">会員情報変更確認画面</p>
    <div class="mypage-edit-check-content">
        <p class="mypage-edit-check-content-left">氏名</p>
        <p><?php echo e($data['name_sei']); ?>　<?php echo e($data['name_mei']); ?></p>
    </div>
    <div class="mypage-edit-check-content">
        <p class="mypage-edit-check-content-left">ニックネーム</p>
        <p><?php echo e($data['nickname']); ?></p>
    </div>
    <div class="mypage-edit-check-content">
        <p class="mypage-edit-check-content-left">性別</p>
        <p>
            <?php $__currentLoopData = config('master.gender'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($data['gender'] == $index): ?> <?php echo e($value); ?> <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </p>
    </div>
    <div class="mypage-edit-check-button">
        <form action="<?php echo e(route('mypage.edit.information.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="name_sei" value="<?php echo e($data['name_sei']); ?>">
            <input type="hidden" name="name_mei" value="<?php echo e($data['name_mei']); ?>">
            <input type="hidden" name="nickname" value="<?php echo e($data['nickname']); ?>">
            <input type="hidden" name="gender" value="<?php echo e($data['gender']); ?>">
            <input type="submit" value="変更完了" class="mypage-edit-check-button-1">
            <br><br>
            <input type="submit" value="前に戻る" name="back" class="mypage-edit-check-button-2">
        </form>
    </div>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/laravelbbs/resources/views/mypage/edit/check.blade.php ENDPATH**/ ?>