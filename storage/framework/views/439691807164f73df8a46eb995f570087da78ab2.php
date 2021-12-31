<?php echo $__env->yieldPushContent('content_header_start'); ?>
<?php if(!$hideHeader): ?>
    <?php if (isset($component)) { $__componentOriginalb22f4301c785c7f3f9133a041c125f6437f0c79d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Transactions\Show\Header::class, ['type' => ''.e($type).'','transaction' => $transaction,'hideHeaderAccount' => ''.e($hideHeaderAccount).'','textHeaderAccount' => ''.e($textHeaderAccount).'','classHeaderAccount' => ''.e($classHeaderAccount).'','hideHeaderCategory' => ''.e($hideHeaderCategory).'','textHeaderCategory' => ''.e($textHeaderCategory).'','classHeaderCategory' => ''.e($classHeaderCategory).'','hideHeaderContact' => ''.e($hideHeaderContact).'','textHeaderContact' => ''.e($textHeaderContact).'','classHeaderContact' => ''.e($classHeaderContact).'','hideHeaderAmount' => ''.e($hideHeaderAmount).'','textHeaderAmount' => ''.e($textHeaderAmount).'','classHeaderAmount' => ''.e($classHeaderAmount).'','hideHeaderPaidAt' => ''.e($hideHeaderPaidAt).'','textHeaderPaidAt' => ''.e($textHeaderPaidAt).'','classHeaderPaidAt' => ''.e($classHeaderPaidAt).'']); ?>
<?php $component->withName('transactions.show.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalb22f4301c785c7f3f9133a041c125f6437f0c79d)): ?>
<?php $component = $__componentOriginalb22f4301c785c7f3f9133a041c125f6437f0c79d; ?>
<?php unset($__componentOriginalb22f4301c785c7f3f9133a041c125f6437f0c79d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php endif; ?>
<?php echo $__env->yieldPushContent('content_header_end'); ?>

<?php echo $__env->yieldPushContent('transaction_start'); ?>
    <?php if (isset($component)) { $__componentOriginal8a4a724269ef21c8bbbaed2bf7ad0eb6e1a08525 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Transactions\Show\Transaction::class, ['type' => ''.e($type).'','transaction' => $transaction,'transactionTemplate' => ''.e($transactionTemplate).'','logo' => ''.e($logo).'','hideCompany' => ''.e($hideCompany).'','hideCompanyLogo' => ''.e($hideCompanyLogo).'','hideCompanyDetails' => ''.e($hideCompanyDetails).'','hideCompanyName' => ''.e($hideCompanyName).'','hideCompanyAddress' => ''.e($hideCompanyAddress).'','hideCompanyTaxNumber' => ''.e($hideCompanyTaxNumber).'','hideCompanyPhone' => ''.e($hideCompanyPhone).'','hideCompanyEmail' => ''.e($hideCompanyEmail).'','hideContentTitle' => ''.e($hideContentTitle).'','hidePaidAt' => ''.e($hidePaidAt).'','hideAccount' => ''.e($hideAccount).'','hideCategory' => ''.e($hideCategory).'','hidePaymentMethods' => ''.e($hidePaymentMethods).'','hideReference' => ''.e($hideReference).'','hideDescription' => ''.e($hideDescription).'','hideAmount' => ''.e($hideAmount).'','textContentTitle' => ''.e($textContentTitle).'','textPaidAt' => ''.e($textPaidAt).'','textAccount' => ''.e($textAccount).'','textCategory' => ''.e($textCategory).'','textPaymentMethods' => ''.e($textPaymentMethods).'','textReference' => ''.e($textReference).'','textDescription' => ''.e($textDescription).'','textPaidBy' => ''.e($textPaidBy).'','hideContact' => ''.e($hideContact).'','hideContactInfo' => ''.e($hideContactInfo).'','hideContactName' => ''.e($hideContactName).'','hideContactAddress' => ''.e($hideContactAddress).'','hideContactTaxNumber' => ''.e($hideContactTaxNumber).'','hideContactPhone' => ''.e($hideContactPhone).'','hideContactEmail' => ''.e($hideContactEmail).'','textReleatedDocumentNumber' => ''.e($textReleatedDocumentNumber).'','textReleatedContact' => ''.e($textReleatedContact).'','textReleatedDocumentDate' => ''.e($textReleatedDocumentDate).'','textReleatedDocumentAmount' => ''.e($textReleatedDocumentAmount).'','textReleatedAmount' => ''.e($textReleatedAmount).'','routeDocumentShow' => ''.e($routeDocumentShow).'']); ?>
<?php $component->withName('transactions.show.transaction'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['hide-releated' => ''.e($hideReletad).'','hide-releated-document-number' => ''.e($hideReletadDocumentNumber).'','hide-releated-contact' => ''.e($hideReletadContact).'','hide-releated-document-date' => ''.e($hideReletadDocumentDate).'','hide-releated-document-amount' => ''.e($hideReletadDocumentAmount).'','hide-releated-amount' => ''.e($hideReletadAmount).'','text-releated-transaction' => ''.e($textReleatedTransansaction).'']); ?>
<?php if (isset($__componentOriginal8a4a724269ef21c8bbbaed2bf7ad0eb6e1a08525)): ?>
<?php $component = $__componentOriginal8a4a724269ef21c8bbbaed2bf7ad0eb6e1a08525; ?>
<?php unset($__componentOriginal8a4a724269ef21c8bbbaed2bf7ad0eb6e1a08525); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php echo $__env->yieldPushContent('transaction_end'); ?>

<?php echo $__env->yieldPushContent('attachment_start'); ?>
    <?php if(!$hideAttachment): ?>
        <?php if (isset($component)) { $__componentOriginal55e2a351a34749ce8c53ba02a233f14e2b8b49ef = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Transactions\Show\Attachment::class, ['type' => ''.e($type).'','transaction' => $transaction,'attachment' => $attachment]); ?>
<?php $component->withName('transactions.show.attachment'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal55e2a351a34749ce8c53ba02a233f14e2b8b49ef)): ?>
<?php $component = $__componentOriginal55e2a351a34749ce8c53ba02a233f14e2b8b49ef; ?>
<?php unset($__componentOriginal55e2a351a34749ce8c53ba02a233f14e2b8b49ef); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <?php endif; ?>
<?php echo $__env->yieldPushContent('attachment_end'); ?>

<?php echo $__env->yieldPushContent('row_footer_start'); ?>
    <?php if(!$hideFooter): ?>
        <?php if (isset($component)) { $__componentOriginal318b00a8e89ea178407844d8bbe0a4d1bcf18df0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Transactions\Show\Footer::class, ['type' => ''.e($type).'','transaction' => $transaction,'histories' => $histories,'classFooterHistories' => ''.e($classFooterHistories).'','hideFooterHistories' => ''.e($hideFooterHistories).'','textHistories' => ''.e($textHistories).'']); ?>
<?php $component->withName('transactions.show.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal318b00a8e89ea178407844d8bbe0a4d1bcf18df0)): ?>
<?php $component = $__componentOriginal318b00a8e89ea178407844d8bbe0a4d1bcf18df0; ?>
<?php unset($__componentOriginal318b00a8e89ea178407844d8bbe0a4d1bcf18df0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <?php endif; ?>
<?php echo $__env->yieldPushContent('row_footer_end'); ?>

<?php echo e(Form::hidden('transaction_id', $transaction->id, ['id' => 'transaction_id'])); ?>

<?php echo e(Form::hidden($type . '_id', $transaction->id, ['id' => $type . '_id'])); ?>

<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/components/transactions/show/content.blade.php ENDPATH**/ ?>