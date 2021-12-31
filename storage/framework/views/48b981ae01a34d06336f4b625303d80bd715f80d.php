<div class="row">
    <?php echo $__env->yieldPushContent('row_footer_histories_start'); ?>
        <?php if(!$hideFooterHistories): ?>
            <div class="<?php echo e($classFooterHistories); ?>">
                <?php if (isset($component)) { $__componentOriginalf348e61b9daf4338d0d27fbda0a8016dec3824e3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Transactions\Show\Histories::class, ['type' => ''.e($type).'','transaction' => $transaction,'histories' => $histories,'textHistories' => ''.e($textHistories).'']); ?>
<?php $component->withName('transactions.show.histories'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalf348e61b9daf4338d0d27fbda0a8016dec3824e3)): ?>
<?php $component = $__componentOriginalf348e61b9daf4338d0d27fbda0a8016dec3824e3; ?>
<?php unset($__componentOriginalf348e61b9daf4338d0d27fbda0a8016dec3824e3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
            </div>
        <?php endif; ?>
    <?php echo $__env->yieldPushContent('row_footer_histories_end'); ?>
</div>

<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/components/transactions/show/footer.blade.php ENDPATH**/ ?>