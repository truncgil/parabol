<?php echo Form::open([
    'id' => 'form-create-currency',
    '@submit.prevent' => 'onSubmit',
    '@keydown' => 'form.errors.clear($event.target.name)',
    'role' => 'form',
    'class' => 'form-loading-button',
    'route' => 'modals.currencies.store',
    'novalidate' => true
]); ?>

    <div class="row">
        <?php echo e(Form::textGroup('name', trans('general.name'), 'chart-bar')); ?>


        <?php echo e(Form::selectGroup('code', trans('currencies.code'), 'code', $codes)); ?>


        <?php echo e(Form::textGroup('rate', trans('currencies.rate'), 'sliders-h', ['@input' => 'onChangeRate', 'required' => 'required'])); ?>


        <?php echo Form::hidden('enabled', 1); ?>

        <?php echo Form::hidden('symbol_first', 1); ?>

        <?php echo Form::hidden('default_currency', 0); ?>

    </div>
<?php echo Form::close(); ?>

<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/modals/currencies/create.blade.php ENDPATH**/ ?>