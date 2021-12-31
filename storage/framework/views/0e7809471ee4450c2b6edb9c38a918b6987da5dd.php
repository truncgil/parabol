<?php $__env->startSection('title', trans('general.title.edit', ['type' => trans_choice('general.vendors', 1)])); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <?php echo Form::model($vendor, [
            'id' => 'vendor',
            'method' => 'PATCH',
            'route' => ['vendors.update', $vendor->id],
            '@submit.prevent' => 'onSubmit',
            '@keydown' => 'form.errors.clear($event.target.name)',
            'files' => true,
            'role' => 'form',
            'class' => 'form-loading-button',
            'novalidate' => true
        ]); ?>


            <div class="card-body">
                <div class="row">
                    <?php echo e(Form::textGroup('name', trans('general.name'), 'user')); ?>


                    <?php echo e(Form::textGroup('email', trans('general.email'), 'envelope', [])); ?>


                    <?php echo e(Form::textGroup('tax_number', trans('general.tax_number'), 'percent', [])); ?>


                    <?php echo e(Form::selectAddNewGroup('currency_code', trans_choice('general.currencies', 1), 'exchange-alt', $currencies, $vendor->currency_code, ['required' => 'required', 'path' => route('modals.currencies.create'), 'field' => ['key' => 'code', 'value' => 'name']])); ?>


                    <?php echo e(Form::textGroup('phone', trans('general.phone'), 'phone', [])); ?>


                    <?php echo e(Form::textGroup('website', trans('general.website'), 'globe',[])); ?>


                    <?php echo e(Form::textareaGroup('address', trans('general.address'))); ?>


                    <?php echo e(Form::fileGroup('logo', trans_choice('general.logos', 1), '', ['dropzone-class' => 'form-file'])); ?>


                    <?php echo e(Form::textGroup('reference', trans('general.reference'), 'file', [])); ?>


                    <?php echo e(Form::radioGroup('enabled', trans('general.enabled'), $vendor->enabled)); ?>

                </div>
            </div>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-purchases-vendors')): ?>
                <div class="card-footer">
                    <div class="row save-buttons">
                        <?php echo e(Form::saveButtons('vendors.index')); ?>

                    </div>
                </div>
            <?php endif; ?>

            <?php echo e(Form::hidden('type', 'vendor')); ?>

        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <script src="<?php echo e(asset('public/js/purchases/vendors.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/purchases/vendors/edit.blade.php ENDPATH**/ ?>