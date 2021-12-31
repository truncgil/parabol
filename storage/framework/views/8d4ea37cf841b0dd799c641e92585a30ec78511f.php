<div class="row" style="font-size: inherit !important">
    <?php echo $__env->yieldPushContent('header_account_start'); ?>
        <?php if(!$hideHeaderAccount): ?>
        <div class="<?php echo e($classHeaderAccount); ?>">
            <?php echo e(trans_choice($textHeaderAccount, 1)); ?>

            <br>

            <strong>
                <span class="float-left long-texts mwpx-200 transaction-head-text">
                    <?php echo e($transaction->account->name); ?>

                </span>
            </strong>
            <br><br>
        </div>
        <?php endif; ?>
    <?php echo $__env->yieldPushContent('header_account_end'); ?>

    <?php echo $__env->yieldPushContent('header_category_start'); ?>
        <?php if(!$hideHeaderCategory): ?>
        <div class="<?php echo e($classHeaderCategory); ?>">
            <?php echo e(trans_choice($textHeaderCategory, 1)); ?>

            <br>

            <strong>
                <span class="float-left long-texts mwpx-300 transaction-head-text">
                    <?php echo e($transaction->category->name); ?>

                </span>
            </strong>
            <br><br>
        </div>
        <?php endif; ?>
    <?php echo $__env->yieldPushContent('header_category_end'); ?>

    <?php echo $__env->yieldPushContent('header_contact_start'); ?>
        <?php if(!$hideHeaderContact): ?>
        <div class="<?php echo e($classHeaderContact); ?>">
            <?php echo e(trans_choice($textHeaderContact, 1)); ?>

            <br>

            <strong>
                <span class="float-left long-texts mwpx-300 transaction-head-text">
                    <?php if(!empty($transaction->contact->id)): ?>
                        <a href="<?php echo e(route($routeContactShow, $transaction->contact->id)); ?>">
                            <?php echo e($transaction->contact->name); ?>

                        </a>
                    <?php else: ?>
                        <?php echo e($transaction->contact->name); ?>

                    <?php endif; ?>
                </span>
            </strong>
            <br><br>
        </div>
        <?php endif; ?>
    <?php echo $__env->yieldPushContent('header_contact_end'); ?>

    <?php echo $__env->yieldPushContent('header_amount_start'); ?>
        <?php if(!$hideHeaderAmount): ?>
        <div class="<?php echo e($classHeaderAmount); ?>">
            <?php echo e(trans($textHeaderAmount)); ?>

            <br>

            <strong>
                <span class="float-left long-texts mwpx-100 transaction-head-text">
                    <?php echo money($transaction->amount, $transaction->currency_code, true); ?>
                </span>
            </strong>
            <br><br>
        </div>
        <?php endif; ?>
    <?php echo $__env->yieldPushContent('header_amount_end'); ?>

    <?php echo $__env->yieldPushContent('header_paid_at_start'); ?>
        <?php if(!$hideHeaderPaidAt): ?>
        <div class="<?php echo e($classHeaderPaidAt); ?>">
            <?php echo e(trans($textHeaderPaidAt)); ?>

            <br>

            <strong>
                <span class="float-left long-texts mwpx-100 transaction-head-text">
                    <?php echo company_date($transaction->paid_at); ?>
                </span>
            </strong>
            <br><br>
        </div>
        <?php endif; ?>
    <?php echo $__env->yieldPushContent('header_paid_at_end'); ?>
</div>
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/components/transactions/show/header.blade.php ENDPATH**/ ?>