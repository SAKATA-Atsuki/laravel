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
        <form action="<?php echo e(route('password.email')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <p class="email-message">パスワード再設定用の URL を記載したメールを送信します。<br>
                ご登録されたメールアドレスを入力してください。</p>
            <div class="email-email">
                <span>メールアドレス</span>
                <input type="text" name="email" size="59" maxlength="255" value="<?php echo e(old('email')); ?>">
            </div>
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="email-error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <input type="submit" value="送信する" class="button-email-1">
            <br>
            <a href="<?php echo e(route('top')); ?>" class="button-email-2">トップに戻る</a>    
        </form>
    </div>
</body>
</html><?php /**PATH /var/www/laravel/laravelbbs/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>