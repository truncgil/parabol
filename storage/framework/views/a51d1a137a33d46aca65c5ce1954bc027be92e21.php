<?php $__env->startSection('title', trans('general.title.edit', ['type' => trans_choice('general.accounts', 1)])); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <?php echo Form::model($account, [
            'id' => 'account',
            'method' => 'PATCH',
            'route' => ['accounts.update', $account->id],
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


                    <?php echo e(Form::textGroup('number', trans('accounts.number'), 'pencil-alt')); ?>


                    <?php echo e(Form::selectAddNewGroup('currency_code', trans_choice('general.currencies', 1), 'exchange-alt', $currencies, $account->currency_code, ['required' => 'required', 'path' => route('modals.currencies.create'), 'field' => ['key' => 'code', 'value' => 'name'], 'change' => 'onChangeCurrency'])); ?>


                    <?php echo e(Form::moneyGroup('opening_balance', trans('accounts.opening_balance'), 'balance-scale', ['required' => 'required', 'currency' => $currency, 'dynamic-currency' => 'currency'], $account->opening_balance)); ?>


                    <?php echo e(Form::textGroup('bank_name', trans('accounts.bank_name'), 'university', [])); ?>


                    <?php echo e(Form::textGroup('bank_phone', trans('accounts.bank_phone'), 'phone', [])); ?>


                    <?php echo e(Form::textareaGroup('bank_address', trans('accounts.bank_address'))); ?>


                    <?php echo e(Form::radioGroup('default_account', trans('accounts.default_account'), $account->default_account)); ?>


                    <?php echo e(Form::radioGroup('enabled', trans('general.enabled'), $account->enabled)); ?>

                </div>
            </div>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-banking-accounts')): ?>
                <div class="card-footer">
                    <div class="row save-buttons">
                        <?php echo e(Form::saveButtons('accounts.index')); ?>

                    </div>
                </div>
            <?php endif; ?>
        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <script src="<?php echo e(asset('public/js/banking/accounts.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/banking/accounts/edit.blade.php ENDPATH**/ ?>