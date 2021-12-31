<?php echo Form::open([
    'id' => 'setting',
    'method' => 'PATCH',
    'route' => 'settings.update',
    '@submit.prevent' => 'onSubmit',
    '@keydown' => 'form.errors.clear($event.target.name)',
    'files' => true,
    'role' => 'form',
    'class' => 'form-loading-button',
    'novalidate' => true
]); ?>

    <div class="row">
        <?php echo e(Form::textGroup('name', trans('settings.company.name'), 'building', ['required' => 'required'], setting('company.name'))); ?>


        <?php echo e(Form::textGroup('email', trans('settings.company.email'), 'envelope', ['required' => 'required'], setting('company.email'))); ?>


        <?php echo e(Form::textGroup('tax_number', trans('general.tax_number'), 'percent', [], setting('company.tax_number'))); ?>


        <?php echo e(Form::textGroup('phone', trans('settings.company.phone'), 'phone', [], setting('company.phone'))); ?>


        <?php echo e(Form::textareaGroup('address', trans('settings.company.address'), null, setting('company.address'))); ?>


        <?php echo Form::hidden('_prefix', 'company'); ?>

    </div>
<?php echo Form::close(); ?>

<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/modals/companies/edit.blade.php ENDPATH**/ ?>