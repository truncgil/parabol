<?php $grand_total = array_sum($class->footer_totals[$table]); ?>

<tfoot>
    <tr class="row rp-border-top-1 font-size-unset px-3">
        <th class="<?php echo e($class->column_name_width); ?> text-uppercase text-left"><?php echo e(trans_choice('general.totals', 1)); ?></th>
        <?php $__currentLoopData = $class->footer_totals[$table]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <th class="<?php echo e($class->column_value_width); ?> text-right px-0"><?php echo e($class->has_money ? money($total, setting('default.currency'), true) : $total); ?></th>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <th class="<?php echo e($class->column_name_width); ?> text-right pl-0 pr-4"><?php echo e($class->has_money ? money($grand_total, setting('default.currency'), true) : $grand_total); ?></th>
    </tr>
</tfoot>
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/partials/reports/table/footer.blade.php ENDPATH**/ ?>