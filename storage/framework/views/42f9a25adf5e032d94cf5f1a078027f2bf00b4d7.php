<?php $__env->startSection('title', trans_choice('general.invoices', 1) . ': ' . $invoice->document_number); ?>

<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginalb1f13d81219ca0f8f9b479b18578783800b17464 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Documents\Template\Ddefault::class, ['type' => 'invoice','document' => $invoice]); ?>
<?php $component->withName('documents.template.ddefault'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalb1f13d81219ca0f8f9b479b18578783800b17464)): ?>
<?php $component = $__componentOriginalb1f13d81219ca0f8f9b479b18578783800b17464; ?>
<?php unset($__componentOriginalb1f13d81219ca0f8f9b479b18578783800b17464); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.print', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/sales/invoices/print_default.blade.php ENDPATH**/ ?>