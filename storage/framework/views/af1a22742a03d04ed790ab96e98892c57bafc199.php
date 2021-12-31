<?php echo $__env->yieldPushContent('company_start'); ?>
<?php if(!$hideCompany): ?>

    <table class="border-bottom-1">
        <tr>
            <?php if(!$hideCompanyLogo): ?>
                <td style="width:5%;" valign="top">
                    <?php echo $__env->yieldPushContent('company_logo_start'); ?>
                    <?php if(!empty($transaction->contact->logo) && !empty($transaction->contact->logo->id)): ?>
                        <img src="<?php echo e(Storage::url($transaction->contact->logo->id)); ?>" height="128" width="128" alt="<?php echo e($transaction->contact_name); ?>" />
                    <?php else: ?>
                        <img src="<?php echo e($logo); ?>" alt="<?php echo e(setting('company.name')); ?>" />
                    <?php endif; ?>
                    <?php echo $__env->yieldPushContent('company_logo_end'); ?>
                </td>
            <?php endif; ?>

            <?php if(!$hideCompanyDetails): ?>
                <td style="width: 60%;">
                    <?php echo $__env->yieldPushContent('company_details_start'); ?>
                    <?php if(!$hideCompanyName): ?>
                        <h2 class="mb-1" style="font-size: 16px;">
                            <?php echo e(setting('company.name')); ?>

                        </h2>
                    <?php endif; ?>

                    <?php if(!$hideCompanyAddress): ?>
                        <p style="margin:0; padding:0; font-size:14px;"><?php echo nl2br(setting('company.address')); ?></p>
                    <?php endif; ?>

                    <?php if(!$hideCompanyTaxNumber): ?>
                        <p style="margin:0; padding:0; font-size:14px;">
                            <?php if(setting('company.tax_number')): ?>
                                <?php echo e(trans('general.tax_number')); ?>: <?php echo e(setting('company.tax_number')); ?>

                            <?php endif; ?>
                        </p>
                    <?php endif; ?>

                    <?php if(!$hideCompanyPhone): ?>
                        <p style="margin:0; padding:0; font-size:14px;">
                            <?php if(setting('company.phone')): ?>
                                <?php echo e(setting('company.phone')); ?>

                            <?php endif; ?>
                        </p>
                    <?php endif; ?>

                    <?php if(!$hideCompanyEmail): ?>
                        <p style="margin:0; padding:0; font-size:14px;"><?php echo e(setting('company.email')); ?></p>
                    <?php endif; ?>
                    <?php echo $__env->yieldPushContent('company_details_end'); ?>
                </td>
            <?php endif; ?>
        </tr>
    </table>
<?php endif; ?>
<?php echo $__env->yieldPushContent('company_end'); ?>

<?php if(!$hideContentTitle): ?>
    <table>
        <tr>
            <td style="padding-bottom: 0; padding-top: 32px;">
                <h2 class="text-center text-uppercase" style="font-size: 16px;">
                    <?php echo e(trans($textContentTitle)); ?>

                </h2>
            </td>
        </tr>
    </table>
<?php endif; ?>

<table>
    <tr>
        <td style="width: 70%; padding-top:0; padding-bottom:0;">
            <table>
           
                <?php echo $__env->yieldPushContent('paid_at_input_start'); ?>
                <?php if(!$hidePaidAt): ?>
                    <tr>

                        <td style="width: 20%; padding-bottom:3px; font-size:14px; font-weight: bold;">
                            <?php echo e(trans($textPaidAt)); ?>:
                            
                        </td>

                        <td class="border-bottom-1" style="width:80%; padding-bottom:3px; font-size:14px;">
                            <?php echo company_date($transaction->paid_at); ?>
                        </td>
                    </tr>
                <?php endif; ?>
                <?php echo $__env->yieldPushContent('paid_at_input_end'); ?>

                <?php echo $__env->yieldPushContent('account_id_input_start'); ?>
                <?php if(!$hideAccount): ?>
                    <tr>
                        <td style="width: 20%; padding-bottom:3px; font-size:14px; font-weight: bold;">
                            <?php echo e(trans_choice($textAccount, 1)); ?>:
                        </td>

                        <td class="border-bottom-1" style="width:80%; padding-bottom:3px; font-size:14px;">
                            <?php echo e($transaction->account->name); ?>

                        </td>
                    </tr>
                <?php endif; ?>
                <?php echo $__env->yieldPushContent('account_id_input_end'); ?>

                <?php echo $__env->yieldPushContent('category_id_input_start'); ?>
                <?php if(!$hideCategory): ?>
                    <tr>
                        <td style="width: 20%; padding-bottom:3px; font-size:14px; font-weight: bold;">
                            <?php echo e(trans_choice($textCategory, 1)); ?>:
                        </td>

                        <td class="border-bottom-1" style="width:80%; padding-bottom:3px; font-size:14px;">
                            <?php echo e($transaction->category->name); ?>

                        </td>
                    </tr>
                <?php endif; ?>
                <?php echo $__env->yieldPushContent('category_id_input_end'); ?>

                <?php echo $__env->yieldPushContent('payment_method_input_start'); ?>
                <?php if(!$hidePaymentMethods): ?>
                    <tr>
                        <td style="width: 20%; padding-bottom:3px; font-size:14px; font-weight: bold;">
                            <?php echo e(trans_choice($textPaymentMethods, 1)); ?>:
                        </td>

                        <td class="border-bottom-1" style="width:80%; padding-bottom:3px; font-size:14px;">
                            <?php echo e(!empty($payment_methods[$transaction->payment_method]) ? $payment_methods[$transaction->payment_method] : trans('general.na')); ?>

                        </td>
                    </tr>
                <?php endif; ?>
                <?php echo $__env->yieldPushContent('payment_method_input_end'); ?>

                <?php echo $__env->yieldPushContent('reference_input_start'); ?>
                <?php if(!$hideReference): ?>
                    <tr>
                        <td style="width: 20%; padding-bottom:3px; font-size:14px; font-weight: bold;">
                            <?php echo e(trans($textReference)); ?>:
                        </td>

                        <td class="border-bottom-1" style="width:80%; padding-bottom:3px; font-size:14px;">
                            <?php echo e($transaction->reference); ?>

                        </td>
                    </tr>
                <?php endif; ?>
                <?php echo $__env->yieldPushContent('reference_input_end'); ?>

                <?php echo $__env->yieldPushContent('description_input_start'); ?>
                <?php if(!$hideDescription): ?>
                    <tr>
                        <td style="width: 20%; padding-bottom:3px; font-size:14px; font-weight: bold;">
                            <?php echo e(trans($textDescription)); ?>:
                        </td>

                        <td style="width:80%; padding-bottom:3px; font-size:14px;">
                            <p style="font-size:14px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; margin: 0;">
                                <?php echo nl2br($transaction->description); ?>

                            </p>
                        </td>
                    </tr>
                <?php endif; ?>
                <?php echo $__env->yieldPushContent('description_input_end'); ?>

                <?php if(!$hideContact): ?>
                    <tr>
                        <td style="padding-top:45px; padding-bottom:0;">
                            <h2 style="font-size: 16px;">
                                <?php echo e(trans($textPaidBy)); ?>

                            </h2>
                        </td>
                    </tr>

                    <?php if($hideContactInfo): ?>
                        <tr>
                            <td style="padding-bottom:5px; padding-top:0; font-size:14px;">
                                <strong><?php echo e(trans($textContactInfo)); ?></strong><br>
                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php echo $__env->yieldPushContent('name_input_start'); ?>
                    <?php if(!$hideContactName): ?>
                        <tr>
                            <td style="padding-bottom:5px; padding-top:0; font-size:14px;">
                                <strong><?php echo e($transaction->contact->name); ?></strong><br>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php echo $__env->yieldPushContent('name_input_end'); ?>

                    <?php echo $__env->yieldPushContent('address_input_start'); ?>
                    <?php if(!$hideContactAddress): ?>
                        <tr>
                            <td style="padding-bottom:5px; padding-top:0; font-size:14px;">
                                <p style="margin:0; padding:0; font-size:14px;">
                                    <?php echo nl2br($transaction->contact->address); ?>

                                </p>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php echo $__env->yieldPushContent('address_input_end'); ?>

                    <?php echo $__env->yieldPushContent('tax_number_input_start'); ?>
                    <?php if(!$hideContactTaxNumber): ?>
                        <tr>
                            <td style="padding-bottom:5px; padding-top:0; font-size:14px;">
                                <p style="margin:0; padding:0; font-size:14px;">
                                    <?php if($transaction->contact->tax_number): ?>
                                        <?php echo e(trans('general.tax_number')); ?>: <?php echo e($transaction->contact->tax_number); ?>

                                    <?php endif; ?>
                                </p>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php echo $__env->yieldPushContent('tax_number_input_end'); ?>

                    <?php echo $__env->yieldPushContent('phone_input_start'); ?>
                    <?php if(!$hideContactPhone): ?>
                        <tr>
                            <td style="padding-bottom:0; padding-top:0; font-size:14px;">
                                <p style="margin:0; padding:0; font-size:14px;">
                                    <?php if($transaction->contact->phone): ?>
                                        <?php echo e($transaction->contact->phone); ?>

                                    <?php endif; ?>
                                </p>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php echo $__env->yieldPushContent('phone_input_end'); ?>

                    <?php echo $__env->yieldPushContent('email_start'); ?>
                    <?php if(!$hideContactEmail): ?>
                        <tr>
                            <td style="padding-bottom:0; padding-top:0; font-size:14px;">
                                <p style="margin:0; padding:0; font-size:14px;">
                                    <?php echo e($transaction->contact->email); ?>

                                </p>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php echo $__env->yieldPushContent('email_input_end'); ?>
                <?php endif; ?>
            </table>
        </td>

        <?php if(!$hideAmount): ?>
            <td style="width:30%; padding-top:32px; padding-left: 25px;" valign="top">
                <table>
                    <tr>
                        <td style="background-color: #6da252; -webkit-print-color-adjust: exact; font-weight:bold !important; display:block;">
                            <h5 class="text-muted mb-0 text-white" style="font-size: 20px; color:#ffffff; text-align:center; margin-top: 16px;">
                                <?php echo e(trans($textAmount)); ?>

                            </h5>

                            <p class="font-weight-bold mb-0 text-white" style="font-size: 26px; color:#ffffff; text-align:center;">
                                <?php echo money($transaction->amount, $transaction->currency_code, true); ?>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        <?php endif; ?>
    </tr>
</table>

<?php if(!$hideReletad): ?>
    <?php if($transaction->document): ?>
        <table>
            <tr>
                <td class="border-bottom-1" style="padding-bottom: 0; padding-top:16px;"></td>
            </tr>
        </table>
  
        <table>
            <tr>
                <td style="padding-bottom: 0; padding-top:36px;">
                    <h2 style="font-size: 16px;"><?php echo e(trans($textReleatedTransansaction)); ?></h2>
                </td>
            </tr>
        </table>

        <table class="table table-flush table-hover" cellspacing="0" cellpadding="0" style="margin-bottom: 36px;">
            <thead style="background-color: #f6f9fc; -webkit-print-color-adjust: exact; font-family: Arial, sans-serif; color:#8898aa; font-size:11px;">
                <tr class="border-bottom-1">    
                    <?php if(!$hideReletadDocumentNumber): ?>
                        <th class="item text-left" style="text-align: left; text-transform: uppercase; font-family: Arial, sans-serif;">
                            <span><?php echo e(trans_choice($textReleatedDocumentNumber, 1)); ?></span>
                        </th>
                    <?php endif; ?>

                    <?php if(!$hideReletadContact): ?>
                        <th class="quantity" style="text-align: left; text-transform: uppercase; font-family: Arial, sans-serif;">
                            <?php echo e(trans_choice($textReleatedContact, 1)); ?>

                        </th>
                    <?php endif; ?>

                    <?php if(!$hideReletadDocumentDate): ?>
                        <th class="price" style="text-align: left; text-transform: uppercase; font-family: Arial, sans-serif;">
                            <?php echo e(trans($textReleatedDocumentDate)); ?>

                        </th>
                    <?php endif; ?>

                    <?php if(!$hideReletadDocumentAmount): ?>
                        <th class="price" style="text-align: left; text-transform: uppercase; font-family: Arial, sans-serif;">
                            <?php echo e(trans($textReleatedDocumentAmount)); ?>

                        </th>
                    <?php endif; ?>

                    <?php if(!$hideReletadAmount): ?>
                        <th class="total" style="text-align: left; text-transform: uppercase; font-family: Arial, sans-serif;">
                            <?php echo e(trans($textReleatedAmount)); ?>

                        </th>
                    <?php endif; ?>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <?php if(!$hideReletadDocumentNumber): ?>
                        <td class="item" style="color:#525f7f; font-size:13px;">
                            <a style="color:#6da252 !important;" href="<?php echo e(route($routeDocumentShow, $transaction->document->id)); ?>">
                                <?php echo e($transaction->document->document_number); ?>

                            </a>
                        </td>
                    <?php endif; ?>

                    <?php if(!$hideReletadContact): ?>
                        <td class="quantity" style="color:#525f7f; font-size:13px;">
                            <?php echo e($transaction->document->contact_name); ?>

                        </td>
                    <?php endif; ?>

                    <?php if(!$hideReletadDocumentDate): ?>
                        <td class="price" style="color:#525f7f; font-size:13px;">
                            <?php echo company_date($transaction->document->due_at); ?>
                        </td>
                    <?php endif; ?>

                    <?php if(!$hideReletadDocumentAmount): ?>
                        <td class="price" style="color:#525f7f; font-size:13px;">
                            <?php echo money($transaction->document->amount, $transaction->document->currency_code, true); ?>
                        </td>
                    <?php endif; ?>

                    <?php if(!$hideReletadAmount): ?>
                        <td class="total" style="color:#525f7f; font-size:13px;">
                            <?php echo money($transaction->amount, $transaction->currency_code, true); ?>
                        </td>
                    <?php endif; ?>
                </tr>
            </tbody>
        </table>
        
    <?php endif; ?>
<?php endif; ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/components/transactions/template/default.blade.php ENDPATH**/ ?>