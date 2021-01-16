<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>パスワード変更</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <p class="mypage-edit-password-title">パスワード変更</p>
    <form action="<?php echo e(route('mypage.edit.password.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mypage-edit-password-content">
            <div class="mypage-edit-password-content-left">
                <span>パスワード</span>
            </div>
            <div>
                <input type="password" name="password1" size="36">
            </div>
        </div>
        <div class="mypage-edit-password-content">
            <?php $__errorArgs = ['password1'];
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
        <br>
        <div class="mypage-edit-password-content">
            <div class="mypage-edit-password-content-left">
                <span>パスワード確認</span>
            </div>
            <div>
                <input type="password" name="password2" size="36">
            </div>
        </div>
        <div class="mypage-edit-password-content">
            <?php $__errorArgs = ['password2'];
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
        <div class="mypage-edit-password-button">
            <input type="submit" value="パスワードを変更" class="mypage-edit-password-button-1">
            <br><br>
            <a href="<?php echo e(route('mypage')); ?>" class="mypage-edit-password-button-2">マイページに戻る</a>    
        </div>
    </form>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/laravelbbs/resources/views/mypage/edit/password.blade.php ENDPATH**/ ?>