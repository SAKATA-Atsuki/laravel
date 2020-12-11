<?php if(count($errors) > 0): ?>
    <div>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<form action="add" method="POST">
    <table>
        <?php echo csrf_field(); ?>
        <tr><th>name:</th><td><input type="text" name="name" value="<?php echo e(old('name')); ?>"></td></tr>
        <tr><th>mail:</th><td><input type="text" name="mail" value="<?php echo e(old('mail')); ?>"></td></tr>
        <tr><th>age:</th><td><input type="number" name="age" value="<?php echo e(old('age')); ?>"></td></tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>    
</form><?php /**PATH /Applications/MAMP/htdocs/laravelbbs/resources/views/person/add.blade.php ENDPATH**/ ?>