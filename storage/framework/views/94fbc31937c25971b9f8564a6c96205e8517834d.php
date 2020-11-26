<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログインフォーム</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body id="body-login">
    <div id="head">
        <p>ログイン</p>
    </div>
    <div id="content">
        <form action="<?php echo e(route('login')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="email-login">
                <span>メールアドレス（ID）</span>
                <input type="text" name="email" size="45" maxlength="255" value="<?php echo e(old('email')); ?>" class="email">
            </div>
            <div>
                <span>パスワード</span>
                <input type="password" name="password" size="45" maxlength="255" value="" class="password-login">
                <a href="<?php echo e(route('password.request')); ?>" class="forget-password">パスワードを忘れた方はこちら</a>
            </div>
            <?php if(count($errors) > 0): ?>
                <p class="error">※IDもしくはパスワードが間違っています</p>
            <?php endif; ?>
            <input type="submit" value="ログイン" class="button-login-1">
            <br>
            <a href="<?php echo e(route('top')); ?>" class="button-login-2">トップに戻る</a>
        </form>
    </div>
</body>
</html><?php /**PATH /var/www/laravel/laravelbbs/resources/views/auth/login.blade.php ENDPATH**/ ?>