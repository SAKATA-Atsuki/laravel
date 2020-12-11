<p><?php echo e($sesdata); ?></p>
<form action="<?php echo e(route('join.session')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="text" name="input">
    <input type="submit" value="send">
</form><?php /**PATH /Applications/MAMP/htdocs/laravelbbs/resources/views/join/session.blade.php ENDPATH**/ ?>