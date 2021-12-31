<?php echo Form::open([
    'id' => 'form-create-account',
    '@submit.prevent' => 'onSubmit',
    '@keydown' => 'form.errors.clear($event.target.name)',
    'role' => 'form',
    'class' => 'form-loading-button',
    'route' => 'accounts.store',
    'novalidate' => true
]); ?>

    <div class="row">
        <?php echo e(Form::textGroup('name', trans('general.name'), 'font')); ?>


        <?php echo e(Form::textGroup('number', trans('accounts.number'), 'pencil-alt')); ?>


        <?php echo e(Form::selectGroup('currency_code', trans_choice('general.currencies', 1), 'exchange-alt', $currencies, setting('default.currency'), ['required' => 'required', 'change' => 'onChangeCurrency'])); ?>


        <?php echo e(Form::moneyGroup('opening_balance', trans('accounts.opening_balance'), 'balance-scale', ['required' => 'required', 'currency' => $currency, 'dynamic-currency' => 'currency'], 0.00)); ?>


        <?php echo Form::hidden('enabled', '1', []); ?>

    </div>
<?php echo Form::close(); ?>

<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/modals/accounts/create.blade.php ENDPATH**/ ?>