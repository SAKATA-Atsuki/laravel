<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>会員情報変更</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <p class="mypage-edit-information-title">会員情報変更</p>
    <form action="<?php echo e(route('mypage.edit.information.check')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mypage-edit-information-content">
            <div>
                <span>氏名　　姓　</span>
                <input type="text" name="name_sei" <?php if(old('name_sei')): ?> value="<?php echo e(old('name_sei')); ?>" <?php else: ?> value="<?php echo e(Auth::user()->name_sei); ?>" <?php endif; ?> size="17">
                <span>　名　</span>
                <input type="text" name="name_mei" <?php if(old('name_mei')): ?> value="<?php echo e(old('name_mei')); ?>" <?php else: ?> value="<?php echo e(Auth::user()->name_mei); ?>" <?php endif; ?> size="17">
            </div>
            <?php $__errorArgs = ['name_sei'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <?php $__errorArgs = ['name_mei'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <br>
            <div>
                <span>ニックネーム　　</span>
                <input type="text" name="nickname" <?php if(old('nickname')): ?> value="<?php echo e(old('nickname')); ?>" <?php else: ?> value="<?php echo e(Auth::user()->nickname); ?>" <?php endif; ?> size="40">
            </div>
            <?php $__errorArgs = ['nickname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <br>
            <div>
                <span>性別　　　</span>
                <?php $__currentLoopData = config('master.gender'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(old('gender')): ?>
                        <input type="radio" name="gender" value="<?php echo e($index); ?>" <?php if(old('gender') == $index): ?> checked <?php endif; ?>><?php echo e($value); ?>

                    <?php else: ?>
                        <input type="radio" name="gender" value="<?php echo e($index); ?>" <?php if(Auth::user()->gender == $index): ?> checked <?php endif; ?>><?php echo e($value); ?>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div class="mypage-edit-information-button">
                <input type="submit" value="確認画面へ" class="mypage-edit-information-button-1">
                <br><br>
                <a href="<?php echo e(route('mypage')); ?>" class="mypage-edit-information-button-2">マイページに戻る</a>    
            </div>
        </div>    
    </form>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/laravelbbs/resources/views/mypage/edit/information.blade.php ENDPATH**/ ?>