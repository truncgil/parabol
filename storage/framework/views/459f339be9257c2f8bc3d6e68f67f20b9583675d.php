<?php $__env->startSection('title', $account->name); ?>

<?php $__env->startSection('new_button'); ?>

    <div class="dropup header-drop-top">    
        <button type="button" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-chevron-down"></i>&nbsp; <?php echo e(trans('general.more_actions')); ?>

        </button>

        <div class="dropdown-menu" role="menu">
            <?php echo $__env->yieldPushContent('button_dropdown_start'); ?>

            <?php echo $__env->yieldPushContent('duplicate_button_start'); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-banking-accounts')): ?>
                <a class="dropdown-item" href="<?php echo e(route('accounts.duplicate', $account->id)); ?>">
                    <?php echo e(trans('general.duplicate')); ?>

                </a>
            <?php endif; ?>
            <?php echo $__env->yieldPushContent('duplicate_button_end'); ?>

            <div class="dropdown-divider"></div>

            <?php echo $__env->yieldPushContent('revenue_button_start'); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-sales-revenues')): ?>
                <a class="dropdown-item" href="<?php echo e(route('accounts.create-revenue', $account->id)); ?>">
                    <?php echo e(trans('general.add_income')); ?>

                </a>
            <?php endif; ?>
            <?php echo $__env->yieldPushContent('revenue_button_end'); ?>

            <?php echo $__env->yieldPushContent('payment_button_start'); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-purchases-payments')): ?>
                <a class="dropdown-item" href="<?php echo e(route('accounts.create-payment', $account->id)); ?>">
                    <?php echo e(trans('general.add_expense')); ?>

                </a>
            <?php endif; ?>
            <?php echo $__env->yieldPushContent('payment_button_end'); ?>

            <?php echo $__env->yieldPushContent('transfer_button_start'); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-banking-transfers')): ?>
                <a class="dropdown-item" href="<?php echo e(route('accounts.create-transfer', $account->id)); ?>">
                    <?php echo e(trans('general.add_transfer')); ?>

                </a>
            <?php endif; ?>
            <?php echo $__env->yieldPushContent('transfer_button_end'); ?>

            <div class="dropdown-divider"></div>

            <?php echo $__env->yieldPushContent('performance_button_start'); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read-banking-accounts')): ?>
                <a class="dropdown-item" href="<?php echo e(route('accounts.see-performance', $account->id)); ?>">
                    <?php echo e(trans('accounts.see_performance')); ?>

                </a>
            <?php endif; ?>
            <?php echo $__env->yieldPushContent('performance_button_end'); ?>

            <div class="dropdown-divider"></div>

            <?php echo $__env->yieldPushContent('delete_button_start'); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-sales-customers')): ?>
                <?php echo Form::deleteLink($account, 'accounts.destroy'); ?>

            <?php endif; ?>
            <?php echo $__env->yieldPushContent('delete_button_end'); ?>

            <?php echo $__env->yieldPushContent('button_dropdown_end'); ?>
        </div>
        <?php echo $__env->yieldPushContent('edit_button_start'); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-sales-customers')): ?>
                <a href="<?php echo e(route('accounts.edit', $account->id)); ?>" class="btn btn-white btn-sm">
                    <?php echo e(trans('general.edit')); ?>

                </a>
            <?php endif; ?>
        <?php echo $__env->yieldPushContent('edit_button_end'); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-3">
            <ul class="list-group mb-4">
                <?php echo $__env->yieldPushContent('account_number_start'); ?>
                <li class="list-group-item d-flex justify-content-between align-items-center border-0 font-weight-600">
                    <?php echo e(trans_choice('general.accounts', 1)); ?> <?php echo e(trans_choice('accounts.number', 2)); ?>

                    <small class="long-texts"><?php echo e($account -> number); ?></small>
                </li>
                <?php echo $__env->yieldPushContent('account_number_end'); ?>

                <?php echo $__env->yieldPushContent('account_currency_start'); ?>
                <li class="list-group-item d-flex justify-content-between align-items-center border-0 border-top-1 font-weight-600">
                    <?php echo e(trans_choice('general.currencies', 2)); ?>

                    <small class="long-texts"> <?php echo e($account -> currency -> name); ?> </small>
                </li>
                <?php echo $__env->yieldPushContent('account_currency_end'); ?>

                <?php echo $__env->yieldPushContent('account_starting_balance_start'); ?>
                <li class="list-group-item d-flex justify-content-between align-items-center border-0 border-top-1 font-weight-600">
                    <?php echo e(trans_choice('accounts.opening_balance', 2)); ?>

                   
                    <small class="long-texts"><?php echo money($account -> opening_balance, $account -> currency_code, true); ?> </small>
                </li>
                <?php echo $__env->yieldPushContent('account_starting_balance_end'); ?>
            </ul>

            <ul class="list-group mb-4">
                <?php echo $__env->yieldPushContent('bank_name_start'); ?>
                <li class="list-group-item border-0">
                    <div class="font-weight-600"><?php echo e(trans('accounts.bank_name')); ?></div>
                    <div><small class="long-texts" title="<?php echo e($account->bank_name); ?>"><?php echo e($account->bank_name); ?></small></div>
                </li>
                <?php echo $__env->yieldPushContent('bank_name_end'); ?>

                <?php echo $__env->yieldPushContent('account_phone_start'); ?>
                <li class="list-group-item border-0 border-top-1">
                    <div class="font-weight-600"><?php echo e(trans('accounts.bank_phone')); ?></div>
                    <div><small class="long-texts" title="<?php echo e($account->bank_phone); ?>"><?php echo e($account->bank_phone); ?></small></div>
                </li>
                <?php echo $__env->yieldPushContent('account_phone_end'); ?>

                <?php echo $__env->yieldPushContent('account_address_start'); ?>
                <li class="list-group-item border-0 border-top-1">
                    <div class="font-weight-600"><?php echo e(trans('accounts.bank_address')); ?></div>
                    <div><small class="long-texts" title="<?php echo e($account->bank_address); ?>"><?php echo e($account->bank_address); ?></small></div>
                </li>
                <?php echo $__env->yieldPushContent('account_address_end'); ?>
            </ul>
        </div>

        <div class="col-xl-9">
            <div class="row mb--3">
                <?php echo $__env->yieldPushContent('account_incoming_card_start'); ?>
                <div class="col-md-4">
                    <div class="card bg-gradient-info border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="text-uppercase text-muted mb-0 text-white"><?php echo e(trans('accounts.incoming')); ?></h5>
                                    <div class="dropdown-divider"></div>
                                    <span class="h2 font-weight-bold mb-0 text-white"><?php echo money($account->income_balance, $account->currency_code, true); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $__env->yieldPushContent('account_incoming_card_end'); ?>

                <?php echo $__env->yieldPushContent('account_outgoing_card_start'); ?>
                <div class="col-md-4">
                    <div class="card bg-gradient-danger border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="text-uppercase text-muted mb-0 text-white"><?php echo e(trans('accounts.outgoing')); ?></h5>
                                    <div class="dropdown-divider"></div>
                                    <span class="h2 font-weight-bold mb-0 text-white"><?php echo money($account->expense_balance, $account->currency_code, true); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $__env->yieldPushContent('account_outgoing_card_end'); ?>

                <?php echo $__env->yieldPushContent('account_balance_card_start'); ?>
                <div class="col-md-4">
                    <div class="card bg-gradient-success border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="text-uppercase text-muted mb-0 text-white"><?php echo e(trans('widgets.account_balance')); ?></h5>
                                    <div class="dropdown-divider"></div>
                                    <span class="h2 font-weight-bold mb-0 text-white"><?php echo money($account->balance, $account->currency_code, true); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $__env->yieldPushContent('account_balance_card_end'); ?>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="nav-wrapper">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                            <?php echo $__env->yieldPushContent('account_transactions_tab_start'); ?>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active" id="transactions-tab" data-toggle="tab" href="#transactions-content" role="tab" aria-controls="transactions-content" aria-selected="true">
                                    <?php echo e(trans_choice('general.transactions', 2)); ?>

                                </a>
                            </li>
                            <?php echo $__env->yieldPushContent('account_transactions_tab_end'); ?>

                            <?php echo $__env->yieldPushContent('account_transfers_tab_start'); ?>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="transfers-tab" data-toggle="tab" href="#transfers-content" role="tab" aria-controls="transfers-content" aria-selected="false">
                                    <?php echo e(trans_choice('general.transfers', 2)); ?>

                                </a>
                            </li>
                            <?php echo $__env->yieldPushContent('account_transfers_tab_end'); ?>
                        </ul>
                    </div>

                    <div class="card">
                        <div class="tab-content" id="account-tab-content">
                            <?php echo $__env->yieldPushContent('account_transactions_content_start'); ?>
                            <div class="tab-pane fade show active" id="transactions-content" role="tabpanel" aria-labelledby="transactions-tab">
                                <div class="table-responsive">
                                    <table class="table table-flush table-hover" id="tbl-transactions">
                                        <thead class="thead-light">
                                            <tr class="row table-head-line">
                                                <th class="col-sm-3"><?php echo e(trans_choice('general.date', 1)); ?></th>
                                                <th class="col-sm-3"><?php echo e(trans('general.amount')); ?></th>
                                                <th class="col-sm-3"><?php echo e(trans_choice('general.types', 1)); ?></th>
                                                <th class="col-sm-3"><?php echo e(trans_choice('general.categories', 1)); ?></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="row align-items-center border-top-1 tr-py">
                                                    <td class="col-sm-3"><a href="<?php echo e(route($item->route_name, $item->route_id)); ?>"><?php echo company_date($item->paid_at); ?></a></td>
                                                    <td class="col-sm-3"><?php echo money($item->amount, $item->currency_code, true); ?></td>
                                                    <td class="col-sm-3"><?php echo e($item->type_title); ?></td> 
                                                    <td class="col-sm-3"><?php echo e($item->category->name); ?></td>
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
                            <?php echo $__env->yieldPushContent('account_transactions_content_end'); ?>

                            <?php echo $__env->yieldPushContent('account_transfers_content_start'); ?>
                            <div class="tab-pane fade" id="transfers-content" role="tabpanel" aria-labelledby="transfers-tab">
                                <div class="table-responsive">
                                    <table class="table table-flush table-hover" id="tbl-transfers">
                                        <thead class="thead-light">
                                            <tr class="row table-head-line">
                                                <th class="col-sm-3"><?php echo e(trans('general.date')); ?></th>
                                                <th class="col-sm-3"><?php echo e(trans('general.amount')); ?></th>
                                                <th class="col-sm-3"><?php echo e(trans_choice('transfers.from_account', 1)); ?></th>
                                                <th class="col-sm-3"><?php echo e(trans_choice('transfers.to_account', 1)); ?></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $__currentLoopData = $transfers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="row align-items-center border-top-1 tr-py">
                                                    <td class="col-sm-3"><a href="<?php echo e(route('transfers.show', $item->id)); ?>"><?php echo company_date($item->expense_transaction->paid_at); ?></a></td>
                                                    <td class="col-sm-3"><?php echo money($item->expense_transaction->amount, $item->expense_transaction->currency_code, true); ?></td>
                                                    <td class="col-sm-3"><?php echo e($item->expense_transaction->account->name); ?></td>
                                                    <td class="col-sm-3"><?php echo e($item->income_transaction->account->name); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>                                 
                                </div>

                                <div class="card-footer py-4 table-action">
                                    <div class="row">
                                        <?php echo $__env->make('partials.admin.pagination', ['items' => $transfers, 'type' => 'transfers'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            </div>
                            <?php echo $__env->yieldPushContent('account_transfers_content_end'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts_start'); ?>
    <script src="<?php echo e(asset('public/js/banking/accounts.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/banking/accounts/show.blade.php ENDPATH**/ ?>