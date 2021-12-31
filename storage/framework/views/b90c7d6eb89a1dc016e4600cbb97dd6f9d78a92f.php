<div class="row">
    <?php echo $__env->yieldPushContent('row_footer_histories_start'); ?>
        <?php if(!$hideFooterHistories): ?>
            <div class="<?php echo e($classFooterHistories); ?>">
                <?php if (isset($component)) { $__componentOriginalc38b3ee360c5d0f5341e8bb01ea6cf37200e90b8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Transfers\Show\Histories::class, ['transfer' => $transfer,'histories' => $histories,'textHistories' => ''.e($textHistories).'']); ?>
<?php $component->withName('transfers.show.histories'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc38b3ee360c5d0f5341e8bb01ea6cf37200e90b8)): ?>
<?php $component = $__componentOriginalc38b3ee360c5d0f5341e8bb01ea6cf37200e90b8; ?>
<?php unset($__componentOriginalc38b3ee360c5d0f5341e8bb01ea6cf37200e90b8); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
            </div>
        <?php endif; ?>
    <?php echo $__env->yieldPushContent('row_footer_histories_end'); ?>
</div>
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/components/transfers/show/footer.blade.php ENDPATH**/ ?>