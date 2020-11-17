<table>
    <tr><th>Data</th></tr>
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($item->getData()); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table><?php /**PATH /Applications/MAMP/htdocs/laravelbbs/resources/views/person/index.blade.php ENDPATH**/ ?>