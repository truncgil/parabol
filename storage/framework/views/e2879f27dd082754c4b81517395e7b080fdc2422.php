<div class="row" style="font-size: inherit !important">
    <?php echo $__env->yieldPushContent('header_account_start'); ?>
        <?php if(!$hideHeaderFromAccount): ?>
        <div class="<?php echo e($classHeaderFromAccount); ?>">
            <?php echo e(trans_choice($textHeaderFromAccount, 1)); ?>

            <br>

            <strong>
                <span class="float-left long-texts mwpx-200 transaction-head-text">
                    <?php echo e($transfer->expense_transaction->account->name); ?>

                </span>
            </strong>
            <br><br>
        </div>
        <?php endif; ?>
    <?php echo $__env->yieldPushContent('header_account_end'); ?>

    <?php echo $__env->yieldPushContent('header_category_start'); ?>
        <?php if(!$hideHeaderToAccount): ?>
        <div class="<?php echo e($classHeaderToAccount); ?>">
            <?php echo e(trans_choice($textHeaderToAccount, 1)); ?>

            <br>

            <strong>
                <span class="float-left long-texts mwpx-300 transaction-head-text">
                    <?php echo e($transfer->income_transaction->account->name); ?>

                </span>
            </strong>
            <br><br>
        </div>
        <?php endif; ?>
    <?php echo $__env->yieldPushContent('header_category_end'); ?>

    <?php echo $__env->yieldPushContent('header_amount_start'); ?>
        <?php if(!$hideHeaderAmount): ?>
        <div class="<?php echo e($classHeaderAmount); ?>">
            <span class="float-right">
                <?php echo e(trans($textHeaderAmount)); ?>

            </span>
            <br>

            <strong>
                <span class="float-right long-texts mwpx-100 transaction-head-text">
                    <?php echo money($transfer->expense_transaction->amount, $transfer->expense_transaction->currency_code, true); ?>
                </span>
            </strong>
            <br><br>
        </div>
        <?php endif; ?>
    <?php echo $__env->yieldPushContent('header_amount_end'); ?>

    <?php echo $__env->yieldPushContent('header_paid_at_start'); ?>
        <?php if(!$hideHeaderPaidAt): ?>
        <div class="<?php echo e($classHeaderPaidAt); ?>">
            <span class="float-right">
                <?php echo e(trans($textHeaderPaidAt)); ?>

            </span>
            <br>

            <strong>
                <span class="float-right long-texts mwpx-100 transaction-head-text">
                    <?php echo company_date($transfer->transferred_at); ?>
                </span>
            </strong>
            <br><br>
        </div>
        <?php endif; ?>
    <?php echo $__env->yieldPushContent('header_paid_at_end'); ?>
</div>
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/components/transfers/show/header.blade.php ENDPATH**/ ?>