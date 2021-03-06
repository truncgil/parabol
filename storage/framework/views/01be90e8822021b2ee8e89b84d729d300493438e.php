<div class="row">
    <div class="col-100">
        <div class="text">
            <h3>
                <?php echo e($textDocumentTitle); ?>

            </h3>

            <?php if($textDocumentSubheading): ?>
                <h5>
                    <?php echo e($textDocumentSubheading); ?>

                </h5>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="row" style="background-color:<?php echo e($backgroundColor); ?> !important; -webkit-print-color-adjust: exact;">
    <div class="col-58">
        <div class="text company pl-2 mb-1 d-flex align-items-center">
            <?php echo $__env->yieldPushContent('company_logo_start'); ?>
            <?php if(!$hideCompanyLogo): ?>
                <?php if(!empty($document->contact->logo) && !empty($document->contact->logo->id)): ?>
                    <img src="<?php echo e($logo); ?>" alt="<?php echo e($document->contact_name); ?>"/>
                <?php else: ?>
                    <img src="<?php echo e($logo); ?>" alt="<?php echo e(setting('company.name')); ?>" />
                <?php endif; ?>

                <?php if(!$hideCompanyName): ?>
                    <strong class="pl-2 text-white"><?php echo e(setting('company.name')); ?></strong>
                <?php endif; ?>
            <?php endif; ?>
            <?php echo $__env->yieldPushContent('company_logo_end'); ?>
        </div>
    </div>

    <div class="col-42">
        <div class="text company">
            <?php echo $__env->yieldPushContent('company_details_start'); ?>
            <?php if(!$hideCompanyDetails): ?>
                <?php if(!$hideCompanyAddress): ?>
                    <strong class="text-white"><?php echo nl2br(setting('company.address')); ?></strong><br><br>
                <?php endif; ?>

                <?php if(!$hideCompanyTaxNumber): ?>
                    <strong class="text-white">
                        <?php if(setting('company.tax_number')): ?>
                            <?php echo e(trans('general.tax_number')); ?>: <?php echo e(setting('company.tax_number')); ?>

                        <?php endif; ?>
                    </strong><br><br>
                <?php endif; ?>

                <?php if(!$hideCompanyPhone): ?>
                    <strong class="text-white">
                        <?php if(setting('company.phone')): ?>
                            <?php echo e(setting('company.phone')); ?>

                        <?php endif; ?>
                    </strong><br><br>
                <?php endif; ?>

                <?php if(!$hideCompanyEmail): ?>
                    <strong class="text-white"><?php echo e(setting('company.email')); ?></strong><br><br>
                <?php endif; ?>
            <?php endif; ?>
            <?php echo $__env->yieldPushContent('company_details_end'); ?>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-58">
        <div class="text company">
            <?php if(!$hideContactInfo): ?>
                <strong><?php echo e(trans($textContactInfo)); ?></strong>
                <br>
            <?php endif; ?>

            <?php echo $__env->yieldPushContent('name_input_start'); ?>
                <?php if(!$hideContactName): ?>
                    <strong><?php echo e($document->contact_name); ?></strong>
                    <br><br>
                <?php endif; ?>
            <?php echo $__env->yieldPushContent('name_input_end'); ?>

            <?php echo $__env->yieldPushContent('address_input_start'); ?>
                <?php if(!$hideContactAddress): ?>
                    <?php echo nl2br($document->contact_address); ?>

                    <br><br>
                <?php endif; ?>
            <?php echo $__env->yieldPushContent('address_input_end'); ?>

            <?php echo $__env->yieldPushContent('tax_number_input_start'); ?>
                <?php if(!$hideContactTaxNumber): ?>
                    <?php if($document->contact_tax_number): ?>
                        <?php echo e(trans('general.tax_number')); ?>: <?php echo e($document->contact_tax_number); ?>

                        <br><br>
                    <?php endif; ?>
                <?php endif; ?>
            <?php echo $__env->yieldPushContent('tax_number_input_end'); ?>

            <?php echo $__env->yieldPushContent('phone_input_start'); ?>
                <?php if(!$hideContactPhone): ?>
                    <?php if($document->contact_phone): ?>
                        <?php echo e($document->contact_phone); ?>

                        <br><br>
                    <?php endif; ?>
                <?php endif; ?>
            <?php echo $__env->yieldPushContent('phone_input_end'); ?>

            <?php echo $__env->yieldPushContent('email_start'); ?>
                <?php if(!$hideContactEmail): ?>
                    <?php echo e($document->contact_email); ?>

                    <br><br>
                <?php endif; ?>
            <?php echo $__env->yieldPushContent('email_input_end'); ?>
        </div>
    </div>

    <div class="col-42">
        <div class="text company">
            <?php echo $__env->yieldPushContent('order_number_input_start'); ?>
                <?php if(!$hideOrderNumber): ?>
                    <?php if($document->order_number): ?>
                        <strong><?php echo e(trans($textOrderNumber)); ?>:</strong>
                        <span class="float-right"><?php echo e($document->order_number); ?></span><br><br>
                    <?php endif; ?>
                <?php endif; ?>
            <?php echo $__env->yieldPushContent('order_number_input_end'); ?>

            <?php echo $__env->yieldPushContent('invoice_number_input_start'); ?>
                <?php if(!$hideDocumentNumber): ?>
                    <strong><?php echo e(trans($textDocumentNumber)); ?>:</strong>
                    <span class="float-right"><?php echo e($document->document_number); ?></span><br><br>
                <?php endif; ?>
            <?php echo $__env->yieldPushContent('invoice_number_input_end'); ?>

            <?php echo $__env->yieldPushContent('issued_at_input_start'); ?>
                <?php if(!$hideIssuedAt): ?>
                    <strong><?php echo e(trans($textIssuedAt)); ?>:</strong>
                    <span class="float-right"><?php echo company_date($document->issued_at); ?></span><br><br>
                <?php endif; ?>
            <?php echo $__env->yieldPushContent('issued_at_input_end'); ?>

            <?php echo $__env->yieldPushContent('due_at_input_start'); ?>
                <?php if(!$hideDueAt): ?>
                    <strong><?php echo e(trans($textDueAt)); ?>:</strong>
                    <span class="float-right"><?php echo company_date($document->due_at); ?></span>
                <?php endif; ?>
            <?php echo $__env->yieldPushContent('due_at_input_end'); ?>
        </div>
    </div>
</div>

<?php if(!$hideItems): ?>
    <div class="row">
        <div class="col-100">
            <div class="text">
                <table class="m-lines">
                    <thead style="background-color:<?php echo e($backgroundColor); ?> !important; -webkit-print-color-adjust: exact;">
                        <tr>
                            <?php echo $__env->yieldPushContent('name_th_start'); ?>
                                <?php if(!$hideItems || (!$hideName && !$hideDescription)): ?>
                                    <th class="item text-left text-white"><?php echo e((trans_choice($textItems, 2) != $textItems) ? trans_choice($textItems, 2) : trans($textItems)); ?></th>
                                <?php endif; ?>
                            <?php echo $__env->yieldPushContent('name_th_end'); ?>

                            <?php echo $__env->yieldPushContent('quantity_th_start'); ?>
                                <?php if(!$hideQuantity): ?>
                                    <th class="quantity text-white"><?php echo e(trans($textQuantity)); ?></th>
                                <?php endif; ?>
                            <?php echo $__env->yieldPushContent('quantity_th_end'); ?>

                            <?php echo $__env->yieldPushContent('price_th_start'); ?>
                                <?php if(!$hidePrice): ?>
                                    <th class="price text-white"><?php echo e(trans($textPrice)); ?></th>
                                <?php endif; ?>
                            <?php echo $__env->yieldPushContent('price_th_end'); ?>

                            <?php if(!$hideDiscount): ?>
                                <?php if(in_array(setting('localisation.discount_location', 'total'), ['item', 'both'])): ?>
                                    <?php echo $__env->yieldPushContent('discount_td_start'); ?>
                                        <th class="discount text-white"><?php echo e(trans('invoices.discount')); ?></th>
                                    <?php echo $__env->yieldPushContent('discount_td_end'); ?>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php echo $__env->yieldPushContent('total_th_start'); ?>
                                <?php if(!$hideAmount): ?>
                                    <th class="total text-white"><?php echo e(trans($textAmount)); ?></th>
                                <?php endif; ?>
                            <?php echo $__env->yieldPushContent('total_th_end'); ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($document->items->count()): ?>
                            <?php $__currentLoopData = $document->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginalb78ba1157694143b3598989228479715c20051e9 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Documents\Template\LineItem::class, ['type' => ''.e($type).'','item' => $item,'document' => $document,'hideItems' => ''.e($hideItems).'','hideName' => ''.e($hideName).'','hideDescription' => ''.e($hideDescription).'','hideQuantity' => ''.e($hideQuantity).'','hidePrice' => ''.e($hidePrice).'','hideDiscount' => ''.e($hideDiscount).'','hideAmount' => ''.e($hideAmount).'']); ?>
<?php $component->withName('documents.template.line-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalb78ba1157694143b3598989228479715c20051e9)): ?>
<?php $component = $__componentOriginalb78ba1157694143b3598989228479715c20051e9; ?>
<?php unset($__componentOriginalb78ba1157694143b3598989228479715c20051e9); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center empty-items">
                                    <?php echo e(trans('documents.empty_items')); ?>

                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="row mt-7">
    <div class="col-58">
        <div class="text company">
            <?php echo $__env->yieldPushContent('notes_input_start'); ?>
                <?php if($hideNote): ?>
                    <?php if($document->notes): ?>
                        <strong><?php echo e(trans_choice('general.notes', 2)); ?></strong><br><br>
                        <?php echo nl2br($document->notes); ?>

                    <?php endif; ?>
                <?php endif; ?>
            <?php echo $__env->yieldPushContent('notes_input_end'); ?>
        </div>
    </div>

    <div class="col-42 float-right text-right">
        <div class="text company pr-2">
            <?php $__currentLoopData = $document->totals_sorted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($total->code != 'total'): ?>
                    <?php echo $__env->yieldPushContent($total->code . '_total_tr_start'); ?>
                    <strong class="float-left"><?php echo e(trans($total->title)); ?>:</strong>
                    <span><?php echo money($total->amount, $document->currency_code, true); ?></span><br><br>
                    <?php echo $__env->yieldPushContent($total->code . '_total_tr_end'); ?>
                <?php else: ?>
                    <?php if($document->paid): ?>
                        <?php echo $__env->yieldPushContent('paid_total_tr_start'); ?>
                        <strong class="float-left"><?php echo e(trans('invoices.paid')); ?>:</strong>
                        <span>- <?php echo money($document->paid, $document->currency_code, true); ?></span><br><br>
                        <?php echo $__env->yieldPushContent('paid_total_tr_end'); ?>
                    <?php endif; ?>
                    <?php echo $__env->yieldPushContent('grand_total_tr_start'); ?>
                        <strong class="float-left"><?php echo e(trans($total->name)); ?>:</strong>
                        <span><?php echo money($document->amount_due, $document->currency_code, true); ?></span>
                    <?php echo $__env->yieldPushContent('grand_total_tr_end'); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<?php if(!$hideFooter): ?>
    <?php if($document->footer): ?>
        <div class="row mt-7">
            <div class="col-100 py-2" style="background-color:<?php echo e($backgroundColor); ?> !important; -webkit-print-color-adjust: exact;">
                <div class="text pl-2">
                    <strong class="text-white"><?php echo nl2br($document->footer); ?></strong>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/components/documents/template/modern.blade.php ENDPATH**/ ?>