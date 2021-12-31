<?php echo $__env->yieldPushContent('button_group_start'); ?>
<?php if(!$hideButtonMoreActions): ?>
    <div class="dropup header-drop-top">
        <button type="button" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-chevron-down"></i>&nbsp; <?php echo e(trans('general.more_actions')); ?>

        </button>

        <div class="dropdown-menu" role="menu">
            <?php echo $__env->yieldPushContent('button_dropdown_start'); ?>
            <?php echo $__env->yieldPushContent('edit_button_start'); ?>
                <?php if(!$hideButtonEdit): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($permissionUpdate)): ?>
                        <a class="dropdown-item" href="<?php echo e(route($routeButtonEdit, $transaction->id)); ?>">
                            <?php echo e(trans('general.edit')); ?>

                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            <?php echo $__env->yieldPushContent('edit_button_end'); ?>

            <?php echo $__env->yieldPushContent('duplicate_button_start'); ?>
                <?php if(!$hideButtonDuplicate): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($permissionCreate)): ?>
                        <a class="dropdown-item" href="<?php echo e(route($routeButtonDuplicate, $transaction->id)); ?>">
                            <?php echo e(trans('general.duplicate')); ?>

                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            <?php echo $__env->yieldPushContent('duplicate_button_end'); ?>

            <?php echo $__env->yieldPushContent('button_dropdown_divider_1_start'); ?>
                <?php if(!$hideButtonGroupDivider1): ?>
                    <div class="dropdown-divider"></div>
                <?php endif; ?>
            <?php echo $__env->yieldPushContent('button_dropdown_divider_1_end'); ?>

            <?php if(!$hideButtonPrint): ?>
                <?php echo $__env->yieldPushContent('button_print_start'); ?>
                <a class="dropdown-item" href="<?php echo e(route($routeButtonPrint, $transaction->id)); ?>" target="_blank">
                    <?php echo e(trans('general.print')); ?>

                </a>
                <?php echo $__env->yieldPushContent('button_print_end'); ?>
            <?php endif; ?>

            <?php echo $__env->yieldPushContent('share_button_start'); ?>
                <?php if(!$hideButtonShare): ?>
                    <a class="dropdown-item" href="<?php echo e($signedUrl); ?>" target="_blank">
                        <?php echo e(trans('general.share')); ?>

                    </a>
                <?php endif; ?>
            <?php echo $__env->yieldPushContent('share_button_end'); ?>

            <?php echo $__env->yieldPushContent('edit_button_start'); ?>
                <?php if(!$hideButtonEmail): ?>
                    <?php if($transaction->contact->email): ?>
                        <a class="dropdown-item" href="<?php echo e(route($routeButtonEmail, $transaction->id)); ?>">
                            <?php echo e(trans('invoices.send_mail')); ?>

                        </a>
                    <?php else: ?>
                        <el-tooltip content="<?php echo e(trans('invoices.messages.email_required')); ?>" placement="right">
                            <button type="button" class="dropdown-item btn-tooltip">
                                <span class="text-disabled"><?php echo e(trans('invoices.send_mail')); ?></span>
                            </button>
                        </el-tooltip>
                    <?php endif; ?>
                <?php endif; ?>
            <?php echo $__env->yieldPushContent('edit_button_end'); ?>

            <?php echo $__env->yieldPushContent('button_pdf_start'); ?>
                <?php if(!$hideButtonPdf): ?>
                    <a class="dropdown-item" href="<?php echo e(route($routeButtonPdf, $transaction->id)); ?>">
                        <?php echo e(trans('general.download_pdf')); ?>

                    </a>
                <?php endif; ?>
            <?php echo $__env->yieldPushContent('button_pdf_end'); ?>

            <?php echo $__env->yieldPushContent('button_dropdown_divider_3_start'); ?>
                <?php if(!$hideButtonGroupDivider3): ?>
                    <div class="dropdown-divider"></div>
                <?php endif; ?>
            <?php echo $__env->yieldPushContent('button_dropdown_divider_3_end'); ?>

            <?php echo $__env->yieldPushContent('delete_button_start'); ?>
                <?php if(!$hideButtonDelete): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($permissionDelete)): ?>
                        <?php if($checkButtonReconciled): ?>
                            <?php if(!$transaction->reconciled): ?>
                                <?php echo Form::deleteLink($transaction, $routeButtonDelete, $textDeleteModal, 'transaction_number'); ?>

                            <?php endif; ?>
                        <?php else: ?>
                            <?php echo Form::deleteLink($transaction, $routeButtonDelete, $textDeleteModal, 'transaction_number'); ?>

                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php echo $__env->yieldPushContent('delete_button_end'); ?>
            <?php echo $__env->yieldPushContent('button_dropdown_end'); ?>
        </div>
    </div>
<?php endif; ?>
<?php echo $__env->yieldPushContent('button_group_end'); ?>

<?php echo $__env->yieldPushContent('add_new_button_start'); ?>
<?php if(!$hideButtonAddNew): ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($permissionCreate)): ?>
        <a href="<?php echo e(route($routeButtonAddNew)); ?>" class="btn btn-white btn-sm">
            <?php echo e(trans('general.add_new')); ?>

        </a>
    <?php endif; ?>
<?php endif; ?>
<?php echo $__env->yieldPushContent('add_new_button_end'); ?>
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/components/transactions/show/top-buttons.blade.php ENDPATH**/ ?>