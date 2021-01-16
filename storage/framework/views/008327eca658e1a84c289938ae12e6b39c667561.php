<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>メールアドレス変更</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <p class="mypage-edit-email-title">メールアドレス変更</p>
    <form action="<?php echo e(route('mypage.edit.email.auth')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mypage-edit-email-content">
            <div class="mypage-edit-email-content-left">
                <span>現在のメールアドレス</span>
            </div>
            <div>
                <span><?php echo e(Auth::user()->email); ?></span>
            </div>
        </div>
        <br>
        <div class="mypage-edit-email-content">
            <div class="mypage-edit-email-content-left">
                <span>変更後のメールアドレス</span>
            </div>
            <div>
                <input type="text" name="email" size="36">
            </div>
        </div>
        <div class="mypage-edit-email-content">
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="mypage-edit-email-button">
            <input type="submit" value="認証メール送信" class="mypage-edit-email-button-1">
            <br><br>
            <a href="<?php echo e(route('mypage')); ?>" class="mypage-edit-email-button-2">マイページに戻る</a>    
        </div>
    </form>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/laravelbbs/resources/views/mypage/edit/email.blade.php ENDPATH**/ ?>