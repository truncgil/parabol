<?php $__env->startSection('title', trans('general.title.new', ['type' => trans_choice('general.payments', 1)])); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <?php echo Form::open([
            'route' => 'payments.store',
            'id' => 'payment',
            '@submit.prevent' => 'onSubmit',
            '@keydown' => 'form.errors.clear($event.target.name)',
            'files' => true,
            'role' => 'form',
            'class' => 'form-loading-button needs-validation',
            'novalidate' => 'true'
        ]); ?>


            <div class="card-body">
                <div class="row">
                    <?php echo e(Form::dateGroup('paid_at', trans('general.date'), 'calendar', ['id' => 'paid_at', 'required' => 'required', 'show-date-format' => company_date_format(), 'date-format' => 'Y-m-d', 'autocomplete' => 'off'], request()->get('paid_at', Date::now()->toDateString()))); ?>


                    <?php echo Form::hidden('currency_code', $account_currency_code, ['id' => 'currency_code', 'class' => 'form-control', 'required' => 'required']); ?>

                    <?php echo Form::hidden('currency_rate', '1', ['id' => 'currency_rate']); ?>


                    <?php echo e(Form::moneyGroup('amount', trans('general.amount'), 'money-bill-alt', ['required' => 'required', 'currency' => $currency, 'dynamic-currency' => 'currency'], 0.00)); ?>


                    <?php echo e(Form::selectAddNewGroup('account_id', trans_choice('general.accounts', 1), 'university', $accounts, setting('default.account'), ['required' => 'required', 'path' => route('modals.accounts.create'), 'change' => 'onChangeAccount'])); ?>


                    <?php echo e(Form::selectRemoteAddNewGroup('contact_id', trans_choice('general.vendors', 1), 'user', $vendors, old('contact.id', old('contact_id', null)), ['path' => route('modals.vendors.create'), 'remote_action' => route('vendors.index')])); ?>


                    <?php echo e(Form::textareaGroup('description', trans('general.description'))); ?>


                    <?php echo e(Form::selectRemoteAddNewGroup('category_id', trans_choice('general.categories', 1), 'folder', $categories, setting('default.expense_category'), ['required' => 'required', 'path' => route('modals.categories.create') . '?type=expense', 'remote_action' => route('categories.index'). '?search=type:expense'])); ?>


                    <?php echo e(Form::recurring('create')); ?>


                    <?php echo e(Form::selectGroup('payment_method', trans_choice('general.payment_methods', 1), 'credit-card', $payment_methods, setting('default.payment_method'))); ?>


                    <?php echo e(Form::textGroup('reference', trans('general.reference'), 'file', [])); ?>


                    <?php echo e(Form::selectGroup('document_id', trans_choice('general.bills', 1), 'file-invoice', [], null, ['disabled' => 'true'])); ?>


                    <?php echo e(Form::fileGroup('attachment', trans('general.attachment'), '', ['dropzone-class' => 'w-100', 'multiple' => 'multiple', 'options' => ['acceptedFiles' => $file_types]], null, 'col-md-12')); ?>

                </div>
            </div>

            <div class="card-footer">
                <div class="row save-buttons">
                    <?php echo e(Form::saveButtons('payments.index')); ?>

                </div>
            </div>

            <?php echo e(Form::hidden('type', 'expense')); ?>

        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <script src="<?php echo e(asset('public/js/purchases/payments.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/purchases/payments/create.blade.php ENDPATH**/ ?>