<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>会員情報確認画面</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body id="body-join">
    <div id="head">
        <p>会員情報確認画面</p>
    </div>
    <div id="content">
        <div class="flex">
            <p class="width-left-join">氏名</p>
            <p class="width-right-join"><?php echo e($session_join['name_sei']); ?>　<?php echo e($session_join['name_mei']); ?></p>
        </div>
        <div class="flex">
            <p class="width-left-join">ニックネーム</p>
            <p class="width-right-join"><?php echo e($session_join['nickname']); ?></p>
        </div>
        <div class="flex">
            <p class="width-left-join">性別</p>
            <p class="width-right-join">
                <?php $__currentLoopData = config('master.gender'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($session_join['gender'] == $index): ?> <?php echo e($value); ?> <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </p>
        </div>
        <div class="flex">
            <p class="width-left-join">パスワード</p>
            <p class="width-right-join">セキュリティのため非表示</p>
        </div>
        <div class="flex">
            <p class="width-left-join">メールアドレス</p>
            <p class="width-right-join"><?php echo e($session_join['email']); ?></p>
        </div>
        <form action="<?php echo e(route('join.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="action" value="submit">
            <input type="submit" value="登録完了" class="button-check-1">
            <br>
            <a href="../join?action=rewrite" class="button-check-2">前に戻る</a>
        </form>
    </div>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/laravelbbs/resources/views/join/check.blade.php ENDPATH**/ ?>