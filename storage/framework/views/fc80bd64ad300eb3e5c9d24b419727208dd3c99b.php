<?php $__env->startSection('title', trans('general.title.edit', ['type' => trans_choice('general.revenues', 1)])); ?>

<?php $__env->startSection('content'); ?>
    <?php if(($recurring = $revenue->recurring) && ($next = $recurring->getNextRecurring())): ?>
        <div class="media mb-3">
            <div class="media-body">
                <div class="media-comment-text">
                    <div class="d-flex">
                        <h5 class="mt-0"><?php echo e(trans('recurring.recurring')); ?></h5>
                    </div>

                    <p class="text-sm lh-160 mb-0"><?php echo e(trans('recurring.message', [
                            'type' => mb_strtolower(trans_choice('general.revenues', 1)),
                            'date' => $next->format($date_format)
                        ])); ?>

                    </p>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="card">
        <?php echo Form::model($revenue, [
            'method' => 'PATCH',
            'files' => true,
            'route' => ['revenues.update', $revenue->id],
            'role' => 'form',
            'id' => 'revenue',
            '@submit.prevent' => 'onSubmit',
            '@keydown' => 'form.errors.clear($event.target.name)',
            'class' => 'form-loading-button',
            'novalidate' => 'true'
        ]); ?>


            <div class="card-body">
                <div class="row">
                    <?php echo e(Form::dateGroup('paid_at', trans('general.date'), 'calendar', ['id' => 'paid_at', 'required' => 'required', 'show-date-format' => company_date_format(), 'date-format' => 'Y-m-d', 'autocomplete' => 'off'], Date::parse($revenue->paid_at)->toDateString())); ?>


                    <?php echo Form::hidden('currency_code', $revenue->currency_code, ['id' => 'currency_code', 'class' => 'form-control', 'required' => 'required']); ?>

                    <?php echo Form::hidden('currency_rate', null, ['id' => 'currency_rate']); ?>


                    <?php echo e(Form::moneyGroup('amount', trans('general.amount'), 'money-bill-alt', ['required' => 'required', 'autofocus' => 'autofocus', 'currency' => $currency, 'dynamic-currency' => 'currency'], $revenue->amount)); ?>


                    <?php echo e(Form::selectAddNewGroup('account_id',  trans_choice('general.accounts', 1), 'university', $accounts, $revenue->account_id, ['required' => 'required', 'path' => route('modals.accounts.create'), 'change' => 'onChangeAccount'])); ?>


                    <?php echo e(Form::selectRemoteAddNewGroup('contact_id', trans_choice('general.customers', 1), 'user', $customers, $revenue->contact_id, ['path' => route('modals.customers.create'), 'remote_action' => route('customers.index')])); ?>


                    <?php echo e(Form::textareaGroup('description', trans('general.description'))); ?>


                    <?php echo e(Form::selectRemoteAddNewGroup('category_id', trans_choice('general.categories', 1), 'folder', $categories, $revenue->category_id, ['required' => 'required', 'path' => route('modals.categories.create') . '?type=income', 'remote_action' => route('categories.index'). '?search=type:income'])); ?>


                    <?php echo e(Form::recurring('edit', $revenue)); ?>


                    <?php echo e(Form::selectGroup('payment_method', trans_choice('general.payment_methods', 1), 'credit-card', $payment_methods, $revenue->payment_method)); ?>


                    <?php echo e(Form::textGroup('reference', trans('general.reference'), 'file',[])); ?>


                    <?php if($revenue->invoice): ?>
                        <?php echo e(Form::textGroup('document', trans_choice('general.invoices', 1), 'file-invoice', ['disabled' => 'true'], $revenue->invoice->document_number)); ?>

                        <?php echo e(Form::hidden('document_id', $revenue->invoice->id)); ?>

                    <?php endif; ?>

                    <?php echo e(Form::fileGroup('attachment', trans('general.attachment'), '', ['dropzone-class' => 'w-100', 'multiple' => 'multiple', 'options' => ['acceptedFiles' => $file_types]], $revenue->attachment, 'col-md-12')); ?>

                </div>
            </div>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-sales-revenues')): ?>
                <div class="card-footer">
                    <div class="row save-buttons">
                        <?php echo e(Form::saveButtons('revenues.index')); ?>

                    </div>
                </div>
            <?php endif; ?>

            <?php echo e(Form::hidden('type', 'income')); ?>

        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <script src="<?php echo e(asset('public/js/sales/revenues.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/sales/revenues/edit.blade.php ENDPATH**/ ?>