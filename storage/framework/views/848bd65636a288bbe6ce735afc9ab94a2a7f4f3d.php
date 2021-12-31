<div class="card show-card" style="padding: 0; padding-left: 15px; padding-right: 15px; border-radius: 0; box-shadow: 0 4px 16px rgba(0,0,0,.2);">
    <div class="card-body show-card-body">
        <?php if($transactionTemplate): ?>
            <?php switch($transactionTemplate):
                case ('classic'): ?>
                    <?php break; ?>
                <?php case ('modern'): ?>
                    <?php break; ?>  
                <?php default: ?>
                    <?php if (isset($component)) { $__componentOriginal0f186c47796876ef829ab37e36d86a4893f488d8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Transactions\Template\Ddefault::class, ['type' => ''.e($type).'','transaction' => $transaction,'logo' => ''.e($logo).'','hideCompany' => ''.e($hideCompany).'','hideCompanyLogo' => ''.e($hideCompanyLogo).'','hideCompanyDetails' => ''.e($hideCompanyDetails).'','hideCompanyName' => ''.e($hideCompanyName).'','hideCompanyAddress' => ''.e($hideCompanyAddress).'','hideCompanyTaxNumber' => ''.e($hideCompanyTaxNumber).'','hideCompanyPhone' => ''.e($hideCompanyPhone).'','hideCompanyEmail' => ''.e($hideCompanyEmail).'','hideContentTitle' => ''.e($hideContentTitle).'','hidePaidAt' => ''.e($hidePaidAt).'','hideAccount' => ''.e($hideAccount).'','hideCategory' => ''.e($hideCategory).'','hidePaymentMethods' => ''.e($hidePaymentMethods).'','hideReference' => ''.e($hideReference).'','hideDescription' => ''.e($hideDescription).'','hideAmount' => ''.e($hideAmount).'','textContentTitle' => ''.e($textContentTitle).'','textPaidAt' => ''.e($textPaidAt).'','textAccount' => ''.e($textAccount).'','textCategory' => ''.e($textCategory).'','textPaymentMethods' => ''.e($textPaymentMethods).'','textReference' => ''.e($textReference).'','textDescription' => ''.e($textDescription).'','textPaidBy' => ''.e($textPaidBy).'','hideContact' => ''.e($hideContact).'','hideContactInfo' => ''.e($hideContactInfo).'','hideContactName' => ''.e($hideContactName).'','hideContactAddress' => ''.e($hideContactAddress).'','hideContactTaxNumber' => ''.e($hideContactTaxNumber).'','hideContactPhone' => ''.e($hideContactPhone).'','hideContactEmail' => ''.e($hideContactEmail).'','textReleatedDocumentNumber' => ''.e($textReleatedDocumentNumber).'','textReleatedContact' => ''.e($textReleatedContact).'','textReleatedDocumentDate' => ''.e($textReleatedDocumentDate).'','textReleatedDocumentAmount' => ''.e($textReleatedDocumentAmount).'','textReleatedAmount' => ''.e($textReleatedAmount).'','routeDocumentShow' => ''.e($routeDocumentShow).'']); ?>
<?php $component->withName('transactions.template.ddefault'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['payment_methods' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($payment_methods),'transaction-template' => ''.e($transactionTemplate).'','hide-releated' => ''.e($hideReletad).'','hide-releated-document-number' => ''.e($hideReletadDocumentNumber).'','hide-releated-contact' => ''.e($hideReletadContact).'','hide-releated-document-date' => ''.e($hideReletadDocumentDate).'','hide-releated-document-amount' => ''.e($hideReletadDocumentAmount).'','hide-releated-amount' => ''.e($hideReletadAmount).'','text-releated-transaction' => ''.e($textReleatedTransansaction).'']); ?>
<?php if (isset($__componentOriginal0f186c47796876ef829ab37e36d86a4893f488d8)): ?>
<?php $component = $__componentOriginal0f186c47796876ef829ab37e36d86a4893f488d8; ?>
<?php unset($__componentOriginal0f186c47796876ef829ab37e36d86a4893f488d8); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
            <?php endswitch; ?>
        <?php else: ?>
            <?php echo $__env->make($transactionTemplate, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/components/transactions/show/transaction.blade.php ENDPATH**/ ?>