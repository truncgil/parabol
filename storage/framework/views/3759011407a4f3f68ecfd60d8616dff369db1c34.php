<?php $__env->startSection('title', trans('general.title.new', ['type' => trans_choice('general.tax_rates', 1)])); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <?php echo Form::open([
            'route' => 'taxes.store',
            'id' => 'tax',
            '@submit.prevent' => 'onSubmit',
            '@keydown' => 'form.errors.clear($event.target.name)',
            'files' => true,
            'role' => 'form',
            'class' => 'form-loading-button',
            'novalidate' => true
        ]); ?>


            <div class="card-body">
                <div class="row">
                    <?php echo e(Form::textGroup('name', trans('general.name'), 'font')); ?>


                    <?php echo e(Form::textGroup('rate', trans('taxes.rate'), 'percent', ['@input' => 'onChangeTaxRate'])); ?>


                    <?php echo e(Form::selectGroup('type', trans_choice('general.types', 1), 'bars', $types, 'normal', ['disabledOptions' => $disable_options])); ?>


                    <?php echo e(Form::radioGroup('enabled', trans('general.enabled'), true)); ?>

                </div>
            </div>

            <div class="card-footer">
                <div class="row save-buttons">
                    <?php echo e(Form::saveButtons('taxes.index')); ?>

                </div>
            </div>
        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <script src="<?php echo e(asset('public/js/settings/taxes.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/settings/taxes/create.blade.php ENDPATH**/ ?>