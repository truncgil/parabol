<?php $__env->startSection('title', trans_choice('general.invoices', 1) . ': ' . $invoice->document_number); ?>

<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginalfc61e2a9b2fe5cbb4cf458f95c1824610fd7b0c3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Documents\Template\Classic::class, ['type' => 'invoice','document' => $invoice]); ?>
<?php $component->withName('documents.template.classic'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalfc61e2a9b2fe5cbb4cf458f95c1824610fd7b0c3)): ?>
<?php $component = $__componentOriginalfc61e2a9b2fe5cbb4cf458f95c1824610fd7b0c3; ?>
<?php unset($__componentOriginalfc61e2a9b2fe5cbb4cf458f95c1824610fd7b0c3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.print', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/sales/invoices/print_classic.blade.php ENDPATH**/ ?>