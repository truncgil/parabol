<?php $__env->startSection('title', trans('general.title.edit', ['type' => trans_choice('general.transfers', 1)])); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <?php echo Form::model($transfer, [
            'id' => 'transfer',
            'method' => 'PATCH',
            'route' => ['transfers.update', $transfer->id],
            '@submit.prevent' => 'onSubmit',
            '@keydown' => 'form.errors.clear($event.target.name)',
            'files' => true,
            'role' => 'form',
            'class' => 'form-loading-button',
            'novalidate' => true
        ]); ?>


            <div class="card-body">
                <div class="row">
                    <?php echo e(Form::selectGroup('from_account_id', trans('transfers.from_account'), 'university', $accounts, $transfer->from_account_id, ['required' => 'required', 'change' => 'onChangeFromAccount'])); ?>


                    <?php echo e(Form::selectGroup('to_account_id', trans('transfers.to_account'), 'university', $accounts, $transfer->to_account_id, ['required' => 'required', 'change' => 'onChangeToAccount'])); ?>


                    <?php if($transfer->from_currency_code != $transfer->to_currency_code): ?>
                        <div class="w-100" :class="[show_rate ? 'd-flex' : 'd-none']">
                            <?php echo Form::hidden('from_currency_code', $transfer->from_currency_code, ['id' => 'from_currency_code', 'v-model' => 'form.from_currency_code']); ?>


                            <?php echo e(Form::textGroup('from_account_rate', trans('transfers.from_account_rate'), 'sliders-h', [':disabled' => "form.from_currency_code == '" . setting('default.currency') . "'"], $transfer->from_account_rate)); ?>


                            <?php echo Form::hidden('to_currency_code', $transfer->to_currency_code, ['id' => 'to_currency_code', 'v-model' => 'form.to_currency_code']); ?>


                            <?php echo e(Form::textGroup('to_account_rate', trans('transfers.to_account_rate'), 'sliders-h', [':disabled' => "form.to_currency_code == '" . setting('default.currency') . "'"], $transfer->to_account_rate)); ?>

                        </div>
                    <?php else: ?>
                        <div class="d-none w-100" :class="[{'d-flex' : show_rate}]">
                            <?php echo Form::hidden('from_currency_code', $transfer->from_currency_code, ['id' => 'from_currency_code', 'v-model' => 'form.from_currency_code']); ?>


                            <?php echo e(Form::textGroup('from_account_rate', trans('transfers.from_account_rate'), 'sliders-h', [':disabled' => "form.from_currency_code == '" . setting('default.currency') . "'"], $transfer->from_account_rate)); ?>


                            <?php echo Form::hidden('to_currency_code', $transfer->to_currency_code, ['id' => 'to_currency_code', 'v-model' => 'form.to_currency_code']); ?>


                            <?php echo e(Form::textGroup('to_account_rate', trans('transfers.to_account_rate'), 'sliders-h', [':disabled' => "form.to_currency_code == '" . setting('default.currency') . "'"], $transfer->to_account_rate)); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo e(Form::moneyGroup('amount', trans('general.amount'), 'money-bill-alt', ['required' => 'required', 'currency' => $currency, 'dynamic-currency' => 'currency'], $transfer->amount)); ?>


                    <?php echo e(Form::dateGroup('transferred_at', trans('general.date'), 'calendar', ['id' => 'transferred_at', 'class' => 'form-control datepicker', 'required' => 'required', 'show-date-format' => company_date_format(), 'date-format' => 'Y-m-d', 'autocomplete' => 'off'], Date::parse($transfer->transferred_at)->toDateString())); ?>


                    <?php echo e(Form::textareaGroup('description', trans('general.description'))); ?>


                    <?php echo e(Form::selectGroup('payment_method', trans_choice('general.payment_methods', 1), 'credit-card', $payment_methods, $transfer->payment_method)); ?>


                    <?php echo e(Form::textGroup('reference', trans('general.reference'), 'file', [])); ?>


                    <?php echo e(Form::fileGroup('attachment', trans('general.attachment'), '', ['dropzone-class' => 'w-100', 'multiple' => 'multiple', 'options' => ['acceptedFiles' => $file_types]], !empty($transfer) ? $transfer->attachment : null , 'col-md-12')); ?>


                    <?php echo Form::hidden('currency_code', $currency->code, ['id' => 'currency_code', 'v-model' => 'form.currency_code']); ?>

                    <?php echo Form::hidden('currency_rate', $currency->rate, ['id' => 'currency_rate', 'v-model' => 'form.currency_rate']); ?>

                </div>
            </div>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-banking-transfers')): ?>
                <div class="card-footer">
                    <div class="row save-buttons">
                        <?php echo e(Form::saveButtons('transfers.index')); ?>

                    </div>
                </div>
            <?php endif; ?>
        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <script type="text/javascript">
        var transfer_edit = <?php echo e($transfer->id); ?>;
    </script>

    <script src="<?php echo e(asset('public/js/banking/transfers.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/banking/transfers/edit.blade.php ENDPATH**/ ?>