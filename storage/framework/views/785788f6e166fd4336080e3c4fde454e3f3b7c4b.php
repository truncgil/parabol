<?php $__env->startSection('title', trans('general.title.edit', ['type' => trans_choice('general.payments', 1)])); ?>

<?php $__env->startSection('content'); ?>
    <?php if(($recurring = $payment->recurring) && ($next = $recurring->getNextRecurring())): ?>
        <div class="media mb-3">
            <div class="media-body">
                <div class="media-comment-text">
                    <div class="d-flex">
                        <h5 class="mt-0"><?php echo e(trans('recurring.recurring')); ?></h5>
                    </div>

                    <p class="text-sm lh-160 mb-0"><?php echo e(trans('recurring.message', [
                            'type' => mb_strtolower(trans_choice('general.payments', 1)),
                            'date' => $next->format($date_format)
                        ])); ?>

                    </p>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="card">
        <?php echo Form::model($payment, [
            'method' => 'PATCH',
            'files' => true,
            'route' => ['payments.update', $payment->id],
            'role' => 'form',
            'id' => 'payment',
            '@submit.prevent' => 'onSubmit',
            '@keydown' => 'form.errors.clear($event.target.name)',
            'class' => 'form-loading-button',
            'novalidate' => 'true'
        ]); ?>


            <div class="card-body">
                <div class="row">
                    <?php echo e(Form::dateGroup('paid_at', trans('general.date'), 'calendar', ['id' => 'paid_at', 'required' => 'required', 'show-date-format' => company_date_format(), 'date-format' => 'Y-m-d', 'autocomplete' => 'off'], Date::parse($payment->paid_at)->toDateString())); ?>


                    <?php echo Form::hidden('currency_code', $payment->currency_code, ['id' => 'currency_code', 'class' => 'form-control', 'required' => 'required']); ?>

                    <?php echo Form::hidden('currency_rate', null, ['id' => 'currency_rate']); ?>


                    <?php echo e(Form::moneyGroup('amount', trans('general.amount'), 'money-bill-alt', ['required' => 'required', 'autofocus' => 'autofocus', 'currency' => $currency, 'dynamic-currency' => 'currency'], $payment->amount)); ?>


                    <?php echo e(Form::selectAddNewGroup('account_id',  trans_choice('general.accounts', 1), 'university', $accounts, $payment->account_id, ['required' => 'required', 'path' => route('modals.accounts.create'), 'change' => 'onChangeAccount'])); ?>


                    <?php echo e(Form::selectRemoteAddNewGroup('contact_id', trans_choice('general.vendors', 1), 'user', $vendors, $payment->contact_id, ['path' => route('modals.vendors.create'), 'remote_action' => route('vendors.index')])); ?>


                    <?php echo e(Form::textareaGroup('description', trans('general.description'))); ?>


                    <?php echo e(Form::selectRemoteAddNewGroup('category_id', trans_choice('general.categories', 1), 'folder', $categories, $payment->category_id, ['required' => 'required', 'path' => route('modals.categories.create') . '?type=expense', 'remote_action' => route('categories.index'). '?search=type:expense'])); ?>


                    <?php echo e(Form::recurring('edit', $payment)); ?>


                    <?php echo e(Form::selectGroup('payment_method', trans_choice('general.payment_methods', 1), 'credit-card', $payment_methods, $payment->payment_method)); ?>


                    <?php echo e(Form::textGroup('reference', trans('general.reference'), 'file',[])); ?>


                    <?php if($payment->bill): ?>
                        <?php echo e(Form::textGroup('document', trans_choice('general.bills', 1), 'file-invoice', ['disabled' => 'true'], $payment->bill->document_number)); ?>

                        <?php echo e(Form::hidden('document_id', $payment->bill->id)); ?>

                    <?php endif; ?>

                    <?php echo e(Form::fileGroup('attachment', trans('general.attachment'), '', ['dropzone-class' => 'w-100', 'multiple' => 'multiple', 'options' => ['acceptedFiles' => $file_types]], $payment->attachment, 'col-md-12')); ?>

                </div>
            </div>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-purchases-payments')): ?>
                <div class="card-footer">
                    <div class="row save-buttons">
                        <?php echo e(Form::saveButtons('payments.index')); ?>

                    </div>
                </div>
            <?php endif; ?>

            <?php echo e(Form::hidden('type', 'expense')); ?>

        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <script src="<?php echo e(asset('public/js/purchases/payments.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/purchases/payments/edit.blade.php ENDPATH**/ ?>