<form action="../rest" method="POST">
    <table>
        <?php echo csrf_field(); ?>
        <tr><th>message:</th><td><input type="text" name="message" value="<?php echo e(old('message')); ?>"></td></tr>
        <tr><th>url:</th><td><input type="text" name="url" value="<?php echo e(old('url')); ?>"></td></tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>    
    </table>
</form><?php /**PATH /Applications/MAMP/htdocs/laravelbbs/resources/views/rest/create.blade.php ENDPATH**/ ?>