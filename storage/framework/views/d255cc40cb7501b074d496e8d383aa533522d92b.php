<?php $__env->startSection('title', trans('general.title.edit', ['type' => trans_choice('general.items', 1)])); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <?php echo Form::model($item, [
            'id' => 'item',
            'method' => 'PATCH',
            'route' => ['items.update', $item->id],
            '@submit.prevent' => 'onSubmit',
            '@keydown' => 'form.errors.clear($event.target.name)',
            'files' => true,
            'role' => 'form',
            'class' => 'form-loading-button',
            'novalidate' => true
        ]); ?>


            <div class="card-body">
                <div class="row">
                    <?php echo e(Form::textGroup('name', trans('general.name'), 'tag')); ?>


                    <?php echo e(Form::multiSelectAddNewGroup('tax_ids', trans_choice('general.taxes', 1), 'percentage', $taxes, $item->tax_ids, ['path' => route('modals.taxes.create'), 'field' => ['key' => 'id', 'value' => 'title']], 'col-md-6 el-select-tags-pl-38')); ?>


                    <?php echo e(Form::textareaGroup('description', trans('general.description'))); ?>


                    <?php echo e(Form::textGroup('sale_price', trans('items.sales_price'), 'money-bill-wave')); ?>


                    <?php echo e(Form::textGroup('purchase_price', trans('items.purchase_price'), 'money-bill-wave-alt')); ?>


                    <?php echo e(Form::selectRemoteAddNewGroup('category_id', trans_choice('general.categories', 1), 'folder', $categories, $item->category_id, ['path' => route('modals.categories.create') . '?type=item', 'remote_action' => route('categories.index'). '?search=type:item'])); ?>


                    <?php echo e(Form::fileGroup('picture', trans_choice('general.pictures', 1), '', ['dropzone-class' => 'form-file'], $item->picture)); ?>


                    <?php echo e(Form::radioGroup('enabled', trans('general.enabled'), $item->enabled)); ?>

                </div>
            </div>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-common-items')): ?>
                <div class="card-footer">
                    <div class="row save-buttons">
                        <?php echo e(Form::saveButtons('items.index')); ?>

                    </div>
                </div>
            <?php endif; ?>

        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <script src="<?php echo e(asset('public/js/common/items.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/common/items/edit.blade.php ENDPATH**/ ?>