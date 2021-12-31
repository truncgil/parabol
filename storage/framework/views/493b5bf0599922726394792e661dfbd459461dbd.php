<?php echo $__env->yieldPushContent('content_header_start'); ?>
<?php if(!$hideHeader): ?>
    <?php if (isset($component)) { $__componentOriginalb0bd23d685dcf66fdb9e749d224258efa8070c5a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Transfers\Show\Header::class, ['transfer' => $transfer,'hideHeaderFromAccount' => ''.e($hideHeaderFromAccount).'','textHeaderFromAccount' => ''.e($textHeaderFromAccount).'','classHeaderFromAccount' => ''.e($classHeaderFromAccount).'','hideHeaderToAccount' => ''.e($hideHeaderToAccount).'','textHeaderToAccount' => ''.e($textHeaderToAccount).'','classHeaderToAccount' => ''.e($classHeaderToAccount).'','hideHeaderAmount' => ''.e($hideHeaderAmount).'','textHeaderAmount' => ''.e($textHeaderAmount).'','classHeaderAmount' => ''.e($classHeaderAmount).'','hideHeaderPaidAt' => ''.e($hideHeaderPaidAt).'','textHeaderPaidAt' => ''.e($textHeaderPaidAt).'','classHeaderPaidAt' => ''.e($classHeaderPaidAt).'']); ?>
<?php $component->withName('transfers.show.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalb0bd23d685dcf66fdb9e749d224258efa8070c5a)): ?>
<?php $component = $__componentOriginalb0bd23d685dcf66fdb9e749d224258efa8070c5a; ?>
<?php unset($__componentOriginalb0bd23d685dcf66fdb9e749d224258efa8070c5a); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php endif; ?>
<?php echo $__env->yieldPushContent('content_header_end'); ?>

<?php echo $__env->yieldPushContent('transfer_start'); ?>
    <?php if (isset($component)) { $__componentOriginal503b9d65fa3a9250f0199980e737c3e9b3b7b8a0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Transfers\Show\Transfer::class, ['transfer' => $transfer,'transferTemplate' => ''.e($transferTemplate).'','hideFromAccount' => ''.e($hideFromAccount).'','hideFromAccountTitle' => ''.e($hideFromAccountTitle).'','hideFromAccountName' => ''.e($hideFromAccountName).'','hideFromAccountNumber' => ''.e($hideFromAccountNumber).'','hideFromAccountBankName' => ''.e($hideFromAccountBankName).'','hideFromAccountBankPhone' => ''.e($hideFromAccountBankPhone).'','hideFromAccountBankAddress' => ''.e($hideFromAccountBankAddress).'','textFromAccountTitle' => ''.e($textFromAccountTitle).'','textFromAccountNumber' => ''.e($textFromAccountNumber).'','hideToAccount' => ''.e($hideToAccount).'','hideToAccountTitle' => ''.e($hideToAccountTitle).'','hideToAccountName' => ''.e($hideToAccountName).'','hideToAccountNumber' => ''.e($hideToAccountNumber).'','hideToAccountBankName' => ''.e($hideToAccountBankName).'','hideToAccountBankPhone' => ''.e($hideToAccountBankPhone).'','hideToAccountBankAddress' => ''.e($hideToAccountBankAddress).'','textToAccountTitle' => ''.e($textToAccountTitle).'','textToAccountNumber' => ''.e($textToAccountNumber).'','hideDetails' => ''.e($hideDetails).'','hideDetailTitle' => ''.e($hideDetailTitle).'','hideDetailDate' => ''.e($hideDetailDate).'','hideDetailPaymentMethod' => ''.e($hideDetailPaymentMethod).'','hideDetailReference' => ''.e($hideDetailReference).'','hideDetailDescription' => ''.e($hideDetailDescription).'','hideDetailAmount' => ''.e($hideDetailAmount).'','textDetailTitle' => ''.e($textDetailTitle).'','textDetailDate' => ''.e($textDetailDate).'','textDetailPaymentMethod' => ''.e($textDetailPaymentMethod).'','textDetailReference' => ''.e($textDetailReference).'','textDetailDescription' => ''.e($textDetailDescription).'','textDetailAmount' => ''.e($textDetailAmount).'']); ?>
<?php $component->withName('transfers.show.transfer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal503b9d65fa3a9250f0199980e737c3e9b3b7b8a0)): ?>
<?php $component = $__componentOriginal503b9d65fa3a9250f0199980e737c3e9b3b7b8a0; ?>
<?php unset($__componentOriginal503b9d65fa3a9250f0199980e737c3e9b3b7b8a0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php echo $__env->yieldPushContent('transfer_end'); ?>

<?php echo $__env->yieldPushContent('attachment_start'); ?>
    <?php if(!$hideAttachment): ?>
        <?php if (isset($component)) { $__componentOriginal2f9649ba4e12d7e3192b59a3ede7b0e050470ec3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Transfers\Show\Attachment::class, ['transfer' => $transfer,'attachment' => $attachment]); ?>
<?php $component->withName('transfers.show.attachment'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal2f9649ba4e12d7e3192b59a3ede7b0e050470ec3)): ?>
<?php $component = $__componentOriginal2f9649ba4e12d7e3192b59a3ede7b0e050470ec3; ?>
<?php unset($__componentOriginal2f9649ba4e12d7e3192b59a3ede7b0e050470ec3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <?php endif; ?>
<?php echo $__env->yieldPushContent('attachment_end'); ?>

<?php echo $__env->yieldPushContent('row_footer_start'); ?>
    <?php if(!$hideFooter): ?>
        <?php if (isset($component)) { $__componentOriginalddf48c16c0a5ae9081eef822e5c0b5721fad0e4d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Transfers\Show\Footer::class, ['transfer' => $transfer,'histories' => $histories,'classFooterHistories' => ''.e($classFooterHistories).'','hideFooterHistories' => ''.e($hideFooterHistories).'','textHistories' => ''.e($textHistories).'']); ?>
<?php $component->withName('transfers.show.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalddf48c16c0a5ae9081eef822e5c0b5721fad0e4d)): ?>
<?php $component = $__componentOriginalddf48c16c0a5ae9081eef822e5c0b5721fad0e4d; ?>
<?php unset($__componentOriginalddf48c16c0a5ae9081eef822e5c0b5721fad0e4d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <?php endif; ?>
<?php echo $__env->yieldPushContent('row_footer_end'); ?>

<?php echo e(Form::hidden('transfer_id', $transfer->id, ['id' => 'transfer_id'])); ?>

<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/components/transfers/show/content.blade.php ENDPATH**/ ?>