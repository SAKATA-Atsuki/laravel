<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>パスワード再設定</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <div id="email-head"></div>
    <div id="email-content">
        <form action="<?php echo e(route('password.update')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="token" value="<?php echo e($token); ?>">
            <div class="password-reset-1">
                <span>パスワード</span>
                <input type="password" name="password" size="58" maxlength="255" value="">
            </div>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="email-error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div class="password-reset-2">
                <span>パスワード確認</span>
                <input type="password" name="password_confirmation" size="58" maxlength="255" value="">
            </div>
            <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="email-error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <input type="submit" value="パスワードリセット" class="button-reset">
            <br>
            <a href="<?php echo e(route('top')); ?>" class="button-email-2">トップに戻る</a>    
        </form>
    </div>
</body>
</html><?php /**PATH /var/www/laravel/laravelbbs/resources/views/auth/passwords/reset.blade.php ENDPATH**/ ?>