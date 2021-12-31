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
                        <a class="dropdown-item" href="<?php echo e(route($routeButtonEdit, $transfer->id)); ?>">
                            <?php echo e(trans('general.edit')); ?>

                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            <?php echo $__env->yieldPushContent('edit_button_end'); ?>

            <?php echo $__env->yieldPushContent('duplicate_button_start'); ?>
                <?php if(!$hideButtonDuplicate): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($permissionCreate)): ?>
                        <a class="dropdown-item" href="<?php echo e(route($routeButtonDuplicate, $transfer->id)); ?>">
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
                <a class="dropdown-item" href="<?php echo e(route($routeButtonPrint, $transfer->id)); ?>" target="_blank">
                    <?php echo e(trans('general.print')); ?>

                </a>
                <?php echo $__env->yieldPushContent('button_print_end'); ?>
            <?php endif; ?>

            <?php echo $__env->yieldPushContent('button_pdf_start'); ?>
                <?php if(!$hideButtonPdf): ?>
                    <a class="dropdown-item" href="<?php echo e(route($routeButtonPdf, $transfer->id)); ?>">
                        <?php echo e(trans('general.download_pdf')); ?>

                    </a>
                <?php endif; ?>
            <?php echo $__env->yieldPushContent('button_pdf_end'); ?>

            <?php echo $__env->yieldPushContent('button_dropdown_divider_2_start'); ?>
                <?php if(!$hideButtonGroupDivider2): ?>
                    <div class="dropdown-divider"></div>
                <?php endif; ?>
            <?php echo $__env->yieldPushContent('button_dropdown_divider_2_end'); ?>

            <?php if(!$hideButtonTemplate): ?>
                <?php echo $__env->yieldPushContent('button_template_start'); ?>
                <button type="button" class="dropdown-item" @click="onTemplate">
                    <?php echo e(trans('general.form.choose', ['field' => trans_choice('general.templates', 1)])); ?>

                </button>
                <?php echo $__env->yieldPushContent('button_template_end'); ?>
            <?php endif; ?>

            <?php echo $__env->yieldPushContent('button_dropdown_divider_3_start'); ?>
                <?php if(!$hideButtonGroupDivider3): ?>
                    <div class="dropdown-divider"></div>
                <?php endif; ?>
            <?php echo $__env->yieldPushContent('button_dropdown_divider_3_end'); ?>

            <?php echo $__env->yieldPushContent('delete_button_start'); ?>
                <?php if(!$hideButtonDelete): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($permissionDelete)): ?>
                        <?php echo Form::deleteLink($transfer, $routeButtonDelete, $textDeleteModal, 'transfer_number'); ?>

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
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/components/transfers/show/top-buttons.blade.php ENDPATH**/ ?>