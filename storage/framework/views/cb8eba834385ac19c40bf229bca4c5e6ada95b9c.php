<?php $__env->startSection('title', trans_choice('general.payments', 1) . ': ' . $payment->id); ?>

<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal0f186c47796876ef829ab37e36d86a4893f488d8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Transactions\Template\Ddefault::class, ['type' => 'expense','transaction' => $payment]); ?>
<?php $component->withName('transactions.template.ddefault'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal0f186c47796876ef829ab37e36d86a4893f488d8)): ?>
<?php $component = $__componentOriginal0f186c47796876ef829ab37e36d86a4893f488d8; ?>
<?php unset($__componentOriginal0f186c47796876ef829ab37e36d86a4893f488d8); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.print', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/purchases/payments/print_default.blade.php ENDPATH**/ ?>