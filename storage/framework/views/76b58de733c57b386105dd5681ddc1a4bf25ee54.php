<?php $__env->startSection('title', $vendor->name); ?>

<?php $__env->startSection('new_button'); ?>
    <div class="dropup header-drop-top">
        <button type="button" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-chevron-down"></i>&nbsp; <?php echo e(trans('general.more_actions')); ?>

        </button>

        <div class="dropdown-menu" role="menu">
            <?php echo $__env->yieldPushContent('button_dropdown_start'); ?>

            <?php echo $__env->yieldPushContent('duplicate_button_start'); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-purchases-vendors')): ?>
                <a class="dropdown-item" href="<?php echo e(route('vendors.duplicate', $vendor->id)); ?>">
                    <?php echo e(trans('general.duplicate')); ?>

                </a>
            <?php endif; ?>
            <?php echo $__env->yieldPushContent('duplicate_button_end'); ?>

            <div class="dropdown-divider"></div>

            <?php echo $__env->yieldPushContent('bill_button_start'); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-purchases-bills')): ?>
                <a class="dropdown-item" href="<?php echo e(route('vendors.create-bill', $vendor->id)); ?>">
                    <?php echo e(trans('bills.create_bill')); ?>

                </a>
            <?php endif; ?>
            <?php echo $__env->yieldPushContent('bill_button_end'); ?>

            <?php echo $__env->yieldPushContent('payment_button_start'); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-purchases-payments')): ?>
                <a class="dropdown-item" href="<?php echo e(route('vendors.create-payment', $vendor->id)); ?>">
                    <?php echo e(trans('payments.create_payment')); ?>

                </a>
            <?php endif; ?>
            <?php echo $__env->yieldPushContent('payment_button_end'); ?>

            <div class="dropdown-divider"></div>

            <?php echo $__env->yieldPushContent('delete_button_start'); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-purchases-vendors')): ?>
                <?php echo Form::deleteLink($vendor, 'vendors.destroy'); ?>

            <?php endif; ?>
            <?php echo $__env->yieldPushContent('delete_button_end'); ?>

            <?php echo $__env->yieldPushContent('button_dropdown_end'); ?>
        </div>
    </div>
    <?php echo $__env->yieldPushContent('edit_button_start'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-purchases-vendors')): ?>
        <a href="<?php echo e(route('vendors.edit', $vendor->id)); ?>" class="btn btn-white btn-sm">
            <?php echo e(trans('general.edit')); ?>

        </a>
    <?php endif; ?>
    <?php echo $__env->yieldPushContent('edit_button_end'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-3">
            <ul class="list-group mb-4">
                <?php echo $__env->yieldPushContent('vendor_bills_count_start'); ?>
                <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                    <?php echo e(trans_choice('general.bills', 2)); ?>

                    <span class="badge badge-primary badge-pill"><?php echo e($counts['bills']); ?></span>
                </li>
                <?php echo $__env->yieldPushContent('vendor_bills_count_end'); ?>

                <?php echo $__env->yieldPushContent('vendor_transactions_count_start'); ?>
                <li class="list-group-item d-flex justify-content-between align-items-center border-0 border-top-1">
                    <?php echo e(trans_choice('general.transactions', 2)); ?>

                    <span class="badge badge-primary badge-pill"><?php echo e($counts['transactions']); ?></span>
                </li>
                <?php echo $__env->yieldPushContent('vendor_transactions_count_end'); ?>
            </ul>

            <ul class="list-group mb-4">
                <?php echo $__env->yieldPushContent('vendor_email_start'); ?>
                <li class="list-group-item border-0">
                    <div class="font-weight-600"><?php echo e(trans('general.email')); ?></div>
                    <div><small class="long-texts" title="<?php echo e($vendor->email); ?>"><?php echo e($vendor->email); ?></small></div>
                </li>
                <?php echo $__env->yieldPushContent('vendor_email_end'); ?>

                <?php echo $__env->yieldPushContent('vendor_phone_start'); ?>
                <li class="list-group-item border-0 border-top-1">
                    <div class="font-weight-600"><?php echo e(trans('general.phone')); ?></div>
                    <div><small class="long-texts" title="<?php echo e($vendor->phone); ?>"><?php echo e($vendor->phone); ?></small></div>
                </li>
                <?php echo $__env->yieldPushContent('vendor_phone_end'); ?>

                <?php echo $__env->yieldPushContent('vendor_website_start'); ?>
                <li class="list-group-item border-0 border-top-1">
                    <div class="font-weight-600"><?php echo e(trans('general.website')); ?></div>
                    <div><small class="long-texts" title="<?php echo e($vendor->website); ?>"><?php echo e($vendor->website); ?></small></div>
                </li>
                <?php echo $__env->yieldPushContent('vendor_website_end'); ?>

                <?php echo $__env->yieldPushContent('vendor_tax_number_start'); ?>
                <li class="list-group-item border-0 border-top-1">
                    <div class="font-weight-600"><?php echo e(trans('general.tax_number')); ?></div>
                    <div><small class="long-texts" title="<?php echo e($vendor->tax_number); ?>"><?php echo e($vendor->tax_number); ?></small></div>
                </li>
                <?php echo $__env->yieldPushContent('vendor_tax_number_end'); ?>

                <?php echo $__env->yieldPushContent('vendor_address_start'); ?>
                <li class="list-group-item border-0 border-top-1">
                    <div class="font-weight-600"><?php echo e(trans('general.address')); ?></div>
                    <div><small><?php echo e($vendor->address); ?></small></div>
                </li>
                <?php echo $__env->yieldPushContent('vendor_address_end'); ?>

                <?php if($vendor->reference): ?>
                    <?php echo $__env->yieldPushContent('vendor_reference_start'); ?>
                    <li class="list-group-item border-0 border-top-1">
                        <div class="font-weight-600"><?php echo e(trans('general.reference')); ?></div>
                        <div><small class="long-texts" title="<?php echo e($vendor->reference); ?>"><?php echo e($vendor->reference); ?></small></div>
                    </li>
                    <?php echo $__env->yieldPushContent('vendor_reference_end'); ?>
                <?php endif; ?>
            </ul>

            <?php echo $__env->yieldPushContent('vendor_edit_button_start'); ?>
            <?php echo $__env->yieldPushContent('vendor_edit_button_end'); ?>
        </div>

        <div class="col-xl-9">
            <div class="row mb--3">
                <?php echo $__env->yieldPushContent('vendor_paid_card_start'); ?>
                <div class="col-md-4">
                    <div class="card bg-gradient-success border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="text-uppercase text-muted mb-0 text-white"><?php echo e(trans('general.paid')); ?></h5>
                                    <div class="dropdown-divider"></div>
                                    <span class="h2 font-weight-bold mb-0 text-white"><?php echo money($amounts['paid'], setting('default.currency'), true); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $__env->yieldPushContent('vendor_paid_card_end'); ?>

                <?php echo $__env->yieldPushContent('vendor_open_card_start'); ?>
                <div class="col-md-4">
                    <div class="card bg-gradient-warning border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="text-uppercase text-muted mb-0 text-white"><?php echo e(trans('widgets.open_bills')); ?></h5>
                                    <div class="dropdown-divider"></div>
                                    <span class="h2 font-weight-bold mb-0 text-white"><?php echo money($amounts['open'], setting('default.currency'), true); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $__env->yieldPushContent('vendor_open_card_end'); ?>

                <?php echo $__env->yieldPushContent('vendor_overdue_card_start'); ?>
                <div class="col-md-4">
                    <div class="card bg-gradient-danger border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="text-uppercase text-muted mb-0 text-white"><?php echo e(trans('widgets.overdue_bills')); ?></h5>
                                    <div class="dropdown-divider"></div>
                                    <span class="h2 font-weight-bold mb-0 text-white"><?php echo money($amounts['overdue'], setting('default.currency'), true); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $__env->yieldPushContent('vendor_overdue_card_end'); ?>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="nav-wrapper">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                        <?php echo $__env->yieldPushContent('vendor_bills_tab_start'); ?>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active" id="bills-tab" data-toggle="tab" href="#bills-content" role="tab" aria-controls="bills-content" aria-selected="false"><?php echo e(trans_choice('general.bills', 2)); ?></a>
                            </li>
                            <?php echo $__env->yieldPushContent('vendor_bills_tab_end'); ?>

                        <?php echo $__env->yieldPushContent('vendor_transactions_tab_start'); ?>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="transactions-tab" data-toggle="tab" href="#transactions-content" role="tab" aria-controls="transactions-content" aria-selected="true"><?php echo e(trans_choice('general.transactions', 2)); ?></a>
                            </li>
                        <?php echo $__env->yieldPushContent('vendor_transactions_tab_end'); ?>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="tab-content" id="myTabContent">
                            <?php echo $__env->yieldPushContent('vendor_bills_content_start'); ?>
                                <div class="tab-pane fade show active" id="bills-content" role="tabpanel" aria-labelledby="transactions-tab">
                                    <div class="table-responsive">
                                        <table class="table table-flush table-hover" id="tbl-bills">
                                            <thead class="thead-light">
                                                <tr class="row table-head-line">
                                                    <th class="col-xs-4 col-sm-1"><?php echo e(trans_choice('general.numbers', 1)); ?></th>
                                                    <th class="col-xs-4 col-sm-3 text-right"><?php echo e(trans('general.amount')); ?></th>
                                                    <th class="col-sm-3 d-none d-sm-block text-left"><?php echo e(trans('invoices.invoice_date')); ?></th>
                                                    <th class="col-sm-3 d-none d-sm-block text-left"><?php echo e(trans('invoices.due_date')); ?></th>
                                                    <th class="col-xs-4 col-sm-2"><?php echo e(trans_choice('general.statuses', 1)); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr class="row align-items-center border-top-1 tr-py">
                                                        <td class="col-xs-4 col-sm-1"><a href="<?php echo e(route('bills.show', $item->id)); ?>"><?php echo e($item->document_number); ?></a></td>
                                                        <td class="col-xs-4 col-sm-3 text-right"><?php echo money($item->amount, $item->currency_code, true); ?></td>
                                                        <td class="col-sm-3 d-none d-sm-block text-left"><?php echo company_date($item->issued_at); ?></td>
                                                        <td class="col-sm-3 d-none d-sm-block text-left"><?php echo company_date($item->due_at); ?></td>
                                                        <td class="col-xs-4 col-sm-2"><span class="badge badge-pill badge-<?php echo e($item->status_label); ?> my--2"><?php echo e(trans('documents.statuses.' . $item->status)); ?></span></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer py-4 table-action">
                                        <div class="row">
                                            <?php echo $__env->make('partials.admin.pagination', ['items' => $bills, 'type' => 'bills'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php echo $__env->yieldPushContent('vendor_bills_content_end'); ?>

                            <?php echo $__env->yieldPushContent('vendor_transactions_content_start'); ?>
                                <div class="tab-pane fade" id="transactions-content" role="tabpanel" aria-labelledby="bills-tab">
                                    <div class="table-responsive">
                                        <table class="table table-flush table-hover" id="tbl-transactions">
                                            <thead class="thead-light">
                                                <tr class="row table-head-line">
                                                    <th class="col-xs-6 col-sm-2"><?php echo e(trans('general.date')); ?></th>
                                                    <th class="col-xs-6 col-sm-2 text-right"><?php echo e(trans('general.amount')); ?></th>
                                                    <th class="col-sm-4 d-none d-sm-block"><?php echo e(trans_choice('general.categories', 1)); ?></th>
                                                    <th class="col-sm-4 d-none d-sm-block"><?php echo e(trans_choice('general.accounts', 1)); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr class="row align-items-center border-top-1 tr-py">
                                                        <td class="col-xs-6 col-sm-2"><a href="<?php echo e(route('payments.show', $item->id)); ?>"><?php echo company_date($item->paid_at); ?></a></td>
                                                        <td class="col-xs-6 col-sm-2 text-right"><?php echo money($item->amount, $item->currency_code, true); ?></td>
                                                        <td class="col-sm-4 d-none d-sm-block"><?php echo e($item->category->name); ?></td>
                                                        <td class="col-sm-4 d-none d-sm-block"><?php echo e($item->account->name); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer py-4 table-action">
                                        <div class="row">
                                            <?php echo $__env->make('partials.admin.pagination', ['items' => $transactions, 'type' => 'transactions'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php echo $__env->yieldPushContent('vendor_transactions_content_end'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <script src="<?php echo e(asset('public/js/purchases/vendors.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/purchases/vendors/show.blade.php ENDPATH**/ ?>