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
        <p class="sent-message">パスワード再設定の案内メールを送信しました。<br>
            （まだパスワード再設定は完了しておりません）<br>
            届きましたメールに記載されている<br>
            『パスワード再設定URL』をクリックし、<br>
            パスワードの再設定を完了させてください。</p>
        <a href="<?php echo e(route('top')); ?>" class="button-email-2">トップに戻る</a>    
    </div>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/laravelbbs/resources/views/auth/passwords/sent.blade.php ENDPATH**/ ?>