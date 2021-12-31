<?php if(!$hideFromAccount): ?>
    <table class="border-bottom-1" style="width: 100%;">
        <tbody>
            <tr>
                <td style="width: 60%; padding-bottom: 15px;">
                    <?php if(!$hideFromAccountTitle): ?>
                        <h2 class="mb-1" style="font-size: 16px;">
                            <?php echo e(trans($textFromAccountTitle)); ?>

                        </h2>
                    <?php endif; ?>

                    <?php if(!$hideFromAccountName): ?>
                        <p style="margin: 0px; padding: 0px; font-size: 14px;">
                            <?php echo e($transfer->expense_transaction->account->name); ?>

                        </p>
                    <?php endif; ?>

                    <?php if(!$hideFromAccountNumber): ?>
                        <p style="margin: 0px; padding: 0px; font-size: 14px;">
                            <?php echo e(trans($textFromAccountNumber)); ?>: <?php echo e($transfer->expense_transaction->account->number); ?>

                        </p>
                    <?php endif; ?>

                    <?php if(!$hideFromAccountBankName): ?>
                        <p style="margin: 0px; padding: 0px; font-size: 14px;">
                            <?php echo e($transfer->expense_transaction->account->bank_name); ?>

                        </p>
                    <?php endif; ?>

                    <?php if(!$hideFromAccountBankPhone): ?>
                        <p style="margin: 0px; padding: 0px; font-size: 14px;">
                            <?php echo e($transfer->expense_transaction->account->bank_phone); ?>

                        </p>
                    <?php endif; ?>

                    <?php if(!$hideFromAccountBankAddress): ?>
                        <p style="margin: 0px; padding: 0px; font-size: 14px;">
                            <?php echo e($transfer->expense_transaction->account->bank_address); ?>

                        </p>
                    <?php endif; ?>
                </td>
            </tr>
        </tbody>
    </table>
<?php endif; ?>

<?php if(!$hideToAccount): ?>
    <table class="border-bottom-1" style="width: 100%; margin-top:15px;">
        <tbody>
            <tr>
                <td style="width: 60%; padding-bottom: 15px;">
                    <?php if(!$hideToAccountTitle): ?>
                        <h2 class="mb-1" style="font-size: 16px;">
                            <?php echo e(trans($textToAccountTitle)); ?>

                        </h2>
                    <?php endif; ?>

                    <?php if(!$hideToAccountName): ?>
                        <p style="margin: 0px; padding: 0px; font-size: 14px;">
                            <?php echo e($transfer->income_transaction->account->name); ?>

                        </p>
                    <?php endif; ?>

                    <?php if(!$hideToAccountNumber): ?>
                        <p style="margin: 0px; padding: 0px; font-size: 14px;">
                            <?php echo e(trans($textToAccountNumber)); ?>: <?php echo e($transfer->income_transaction->account->number); ?>

                        </p>
                    <?php endif; ?>

                    <?php if(!$hideToAccountBankName): ?>
                        <p style="margin: 0px; padding: 0px; font-size: 14px;">
                            <?php echo e($transfer->income_transaction->account->bank_name); ?>

                        </p>
                    <?php endif; ?>

                    <?php if(!$hideToAccountBankPhone): ?>
                        <p style="margin: 0px; padding: 0px; font-size: 14px;">
                            <?php echo e($transfer->income_transaction->account->bank_phone); ?>

                        </p>
                    <?php endif; ?>

                    <?php if(!$hideToAccountBankAddress): ?>
                        <p style="margin: 0px; padding: 0px; font-size: 14px;">
                            <?php echo e($transfer->income_transaction->account->bank_address); ?>

                        </p>
                    <?php endif; ?>
                </td>
            </tr>
        </tbody>
    </table>
<?php endif; ?>

<?php if(!$hideDetails): ?>
    <?php if(!$hideDetailTitle): ?>
        <table>
            <tr>
                <td style="padding-bottom: 0; padding-top: 32px;">
                    <h2 class="text-center text-uppercase" style="font-size: 16px;">
                        <?php echo e(trans_choice($textDetailTitle, 2)); ?>

                    </h2>
                </td>
            </tr>
        </table>
    <?php endif; ?>

    <table>
        <tr>
            <td style="width: 70%; padding-top:0; padding-bottom:0;">
                <table>
                    <?php if(!$hideDetailDate): ?>
                        <tr>
                            <td style="width: 20%; padding-bottom:3px; font-size:14px; font-weight: bold;">
                                <?php echo e(trans($textDetailDate)); ?>:
                            </td>

                            <td class="border-bottom-1" style="width:80%; padding-bottom:3px; font-size:14px;">
                                <?php echo company_date($transfer->expense_transaction->paid_at); ?>
                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php if(!$hideDetailPaymentMethod): ?>
                        <tr>
                            <td style="width: 20%; padding-bottom:3px; font-size:14px; font-weight: bold;">
                                <?php echo e(trans_choice($textDetailPaymentMethod, 1)); ?>:
                            </td>

                            <td class="border-bottom-1" style="width:80%; padding-bottom:3px; font-size:14px;">
                                <?php echo e(!empty($payment_methods[$transfer->expense_transaction->payment_method]) ? $payment_methods[$transfer->expense_transaction->payment_method] : trans('general.na')); ?>

                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php if(!$hideDetailReference): ?>
                        <tr>
                            <td style="width: 20%; padding-bottom:3px; font-size:14px; font-weight: bold;">
                                <?php echo e(trans($textDetailReference)); ?>:
                            </td>

                            <td class="border-bottom-1" style="width:80%; padding-bottom:3px; font-size:14px;">
                                <?php echo e($transfer->expense_transaction->reference); ?>

                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php if(!$hideDetailDescription): ?>
                        <tr>
                            <td style="width: 20%; padding-bottom:3px; font-size:14px; font-weight: bold;">
                                <?php echo e(trans($textDetailDescription)); ?>

                            </td>

                            <td class="border-bottom-1" style="width:80%; padding-bottom:3px; font-size:14px;">
                                <?php echo e($transfer->expense_transaction->description); ?>

                            </td>
                        </tr>
                    <?php endif; ?>
                </table>
            </td>

            <?php if(!$hideDetailAmount): ?>
                <td style="width:30%; padding-top:32px; padding-left: 25px;" valign="top">
                    <table>
                        <tr>
                            <td style="background-color: #6da252; -webkit-print-color-adjust: exact; font-weight:bold !important; display:block;">
                                <h5 class="text-muted mb-0 text-white" style="font-size: 20px; color:#ffffff; text-align:center; margin-top: 16px;">
                                    <?php echo e(trans($textDetailAmount)); ?>:
                                </h5>

                                <p class="font-weight-bold mb-0 text-white" style="font-size: 26px; color:#ffffff; text-align:center;">
                                    <?php echo money($transfer->expense_transaction->amount, $transfer->expense_transaction->currency_code, true); ?>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            <?php endif; ?>
        </tr>
    </table>
<?php endif; ?>
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/components/transfers/template/default.blade.php ENDPATH**/ ?>