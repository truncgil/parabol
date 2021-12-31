
<?php echo Form::model($vendor, [
    'id' => 'form-edit-vendor',
    'method' => 'PATCH',
    'route' => ['vendors.update', $vendor->id],
    '@submit.prevent' => 'onSubmit',
    '@keydown' => 'form.errors.clear($event.target.name)',
    'files' => true,
    'role' => 'form',
    'class' => 'form-loading-button',
    'novalidate' => true
]); ?>

    <div class="row">
        <?php echo e(Form::textGroup('name', trans('general.name'), 'font')); ?>


        <?php echo e(Form::textGroup('email', trans('general.email'), 'envelope', [])); ?>


        <?php echo e(Form::textGroup('tax_number', trans('general.tax_number'), 'percent', [])); ?>


        <?php echo e(Form::selectGroup('currency_code', trans_choice('general.currencies', 1), 'exchange-alt', $currencies, $vendor->currency_code)); ?>


        <?php echo e(Form::textareaGroup('address', trans('general.address'), null, $vendor->address)); ?>


        <?php echo e(Form::hidden('type', 'vendor')); ?>

        <?php echo Form::hidden('enabled', '1', []); ?>

    </div>
<?php echo Form::close(); ?>

<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/modals/vendors/edit.blade.php ENDPATH**/ ?>