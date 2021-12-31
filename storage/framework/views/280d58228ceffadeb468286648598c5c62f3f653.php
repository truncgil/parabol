<?php echo Form::open([
    'id' => 'form-create-customer',
    '@submit.prevent' => 'onSubmit',
    '@keydown' => 'form.errors.clear($event.target.name)',
    'role' => 'form',
    'class' => 'form-loading-button',
    'route' => 'customers.store',
    'novalidate' => true
]); ?>

    <div class="row">
        <?php echo e(Form::textGroup('name', trans('general.name'), 'font')); ?>


        <?php echo e(Form::textGroup('email', trans('general.email'), 'envelope', [])); ?>


        <?php echo e(Form::textGroup('tax_number', trans('general.tax_number'), 'percent', [])); ?>


        <?php echo e(Form::selectGroup('currency_code', trans_choice('general.currencies', 1), 'exchange-alt', $currencies, setting('default.currency'))); ?>


        <?php echo e(Form::textareaGroup('address', trans('general.address'))); ?>


        <?php echo e(Form::hidden('type', 'customer')); ?>

        <?php echo Form::hidden('enabled', '1', []); ?>

    </div>
<?php echo Form::close(); ?>

<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/modals/customers/create.blade.php ENDPATH**/ ?>