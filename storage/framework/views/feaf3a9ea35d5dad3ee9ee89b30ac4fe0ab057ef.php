<?php $__env->startSection('title', trans_choice('general.payments', 2)); ?>

<?php $__env->startSection('new_button'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-purchases-payments')): ?>
        <a href="<?php echo e(route('payments.create')); ?>" class="btn btn-success btn-sm"><?php echo e(trans('general.add_new')); ?></a>
        <a href="<?php echo e(route('import.create', ['group' => 'purchases', 'type' => 'payments'])); ?>" class="btn btn-white btn-sm"><?php echo e(trans('import.import')); ?></a>
    <?php endif; ?>
    <a href="<?php echo e(route('payments.export', request()->input())); ?>" class="btn btn-white btn-sm"><?php echo e(trans('general.export')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if($payments->count() || request()->get('search', false)): ?>
        <div class="card">
            <div class="card-header border-bottom-0" :class="[{'bg-gradient-primary': bulk_action.show}]">
                <?php echo Form::open([
                    'method' => 'GET',
                    'route' => 'payments.index',
                    'role' => 'form',
                    'class' => 'mb-0'
                ]); ?>

                    <div class="align-items-center" v-if="!bulk_action.show">
                        <?php if (isset($component)) { $__componentOriginaldec57d2dc7c3b62478d574f9a4a67fba694d4f23 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SearchString::class, ['model' => 'App\Models\Purchase\Payment']); ?>
<?php $component->withName('search-string'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginaldec57d2dc7c3b62478d574f9a4a67fba694d4f23)): ?>
<?php $component = $__componentOriginaldec57d2dc7c3b62478d574f9a4a67fba694d4f23; ?>
<?php unset($__componentOriginaldec57d2dc7c3b62478d574f9a4a67fba694d4f23); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    </div>

                    <?php echo e(Form::bulkActionRowGroup('general.payments', $bulk_actions, ['group' => 'purchases', 'type' => 'payments'])); ?>

                <?php echo Form::close(); ?>

            </div>

            <div class="table-responsive">
                <table class="table table-flush table-hover">
                    <thead class="thead-light">
                        <tr class="row table-head-line">
                            <th class="col-sm-2 col-md-2 col-lg-1 col-xl-1 d-none d-sm-block"><?php echo e(Form::bulkActionAllGroup()); ?></th>
                            <th class="col-xs-4 col-sm-4 col-md-3 col-lg-1 col-xl-1"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('paid_at', trans('general.date'), ['filter' => 'active, visible'], ['class' => 'col-aka', 'rel' => 'nofollow']));?></th>
                            <th class="col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 text-right"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('amount', trans('general.amount')));?></th>
                            <th class="col-md-2 col-lg-3 col-xl-3 d-none d-md-block text-left"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('contact.name', trans_choice('general.vendors', 1)));?></th>
                            <th class="col-lg-2 col-xl-2 d-none d-lg-block text-left"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('category.name', trans_choice('general.categories', 1)));?></th>
                            <th class="col-lg-2 col-xl-2 d-none d-lg-block text-left">A????klama</th>
                            <th class="col-lg-2 col-xl-2 d-none d-lg-block text-left"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('account.name', trans_choice('general.accounts', 1)));?></th>
                            <th class="col-xs-4 col-sm-2 col-md-2 col-lg-1 col-xl-1 text-center"><a><?php echo e(trans('general.actions')); ?></a></th>
                        </tr>
                    </thead>

                    <tbody>
                            <?php $toplam = array(); ?>
                        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!isset($toplam[$item->contact->name])) $toplam[$item->contact->name] = 0; ?>
                            <tr class="row align-items-center border-top-1">
                                <td class="col-sm-2 col-md-2 col-lg-1 col-xl-1 d-none d-sm-block"><?php echo e(Form::bulkActionGroup($item->id, $item->contact->name)); ?></td>
                                <?php if($item->reconciled): ?>
                                    <td class="col-xs-4 col-sm-4 col-md-3 col-lg-1 col-xl-1"><a class="col-aka" href="#"><?php echo company_date($item->paid_at); ?></a></td>
                                <?php else: ?>
                                    <td class="col-xs-4 col-sm-4 col-md-3 col-lg-1 col-xl-1"><a class="col-aka" href="<?php echo e(route('payments.show', $item->id)); ?>"><?php echo company_date($item->paid_at); ?></a></td>
                                <?php endif; ?>
                                <td class="col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 text-right"><?php echo money($item->amount, $item->currency_code, true); ?></td>
                                <td class="col-md-2 col-lg-3 col-xl-3 d-none d-md-block text-left">
                                    <?php echo e($item->contact->name); ?>

<?php $toplam[$item->contact->name] += $item->amount; ?>
                                    <?php if($item->bill): ?>
                                        <?php if($item->bill->status == 'paid'): ?>
                                            <el-tooltip content="<?php echo e($item->bill->document_number); ?> / <?php echo e(trans('documents.statuses.paid')); ?>"
                                            effect="success"
                                            :open-delay="100"
                                            placement="top">
                                                <span class="badge badge-dot pl-2 h-0">
                                                    <i class="bg-success"></i>
                                                </span>
                                            </el-tooltip>
                                        <?php elseif($item->bill->status == 'partial'): ?>
                                            <el-tooltip content="<?php echo e($item->bill->document_number); ?> / <?php echo e(trans('documents.statuses.partial')); ?>"
                                            effect="info"
                                            :open-delay="100"
                                            placement="top">
                                                <span class="badge badge-dot pl-2 h-0">
                                                    <i class="bg-info"></i>
                                                </span>
                                            </el-tooltip>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                  
                                </td>
                                <td class="col-lg-2 col-xl-2 d-none d-lg-block text-left long-texts"><?php echo e($item->category->name); ?></td>
                                <td class="col-lg-2 col-xl-2 d-none d-lg-block text-left long-texts"><?php echo e($item->description); ?></td>
                                <td class="col-lg-2 col-xl-2 d-none d-lg-block text-left long-texts"><?php echo e($item->account->name); ?></td>
                                <td class="col-xs-4 col-sm-2 col-md-2 col-lg-1 col-xl-1 text-center">
                                    <div class="dropdown">
                                        <a class="btn btn-neutral btn-sm text-light items-align-center py-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-muted"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="<?php echo e(route('payments.show', $item->id)); ?>"><?php echo e(trans('general.show')); ?></a>

                                            <?php if(!$item->reconciled): ?>
                                                <a class="dropdown-item" href="<?php echo e(route('payments.edit', $item->id)); ?>"><?php echo e(trans('general.edit')); ?></a>
                                                <div class="dropdown-divider"></div>
                                            <?php endif; ?>

                                            <?php if(empty($item->document_id)): ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-purchases-payments')): ?>
                                                <a class="dropdown-item" href="<?php echo e(route('payments.duplicate', $item->id)); ?>"><?php echo e(trans('general.duplicate')); ?></a>
                                                <div class="dropdown-divider"></div>
                                            <?php endif; ?>
                                            <?php endif; ?>

                                            <?php if(!$item->reconciled): ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-purchases-payments')): ?>
                                                <?php echo Form::deleteLink($item, 'payments.destroy'); ?>

                                            <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
 
            <div class="card-footer table-action">
                <div class="row">
                    <?php echo $__env->make('partials.admin.pagination', ['items' => $payments], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                    
                </div>
                
               
            </div>

            <div class="row m-1">
                <div class="col-12">G??r??nen Listenin Toplam??</div>
                <?php foreach($toplam AS $alan => $deger) {
                         ?>
                            
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <strong><?php echo e($alan); ?></strong>
                                        <br> 
                                        <?php echo money($deger, "TRY", true); ?>
                                    </div>
                                </div>
                                
                            </div>
                         <?php 
                    } ?>
                </div>
              
        </div>
    <?php else: ?>
        <?php if (isset($component)) { $__componentOriginald468e2fade69e67273028f1262ac2cab98f9a730 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\EmptyPage::class, ['group' => 'purchases','page' => 'payments']); ?>
<?php $component->withName('empty-page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginald468e2fade69e67273028f1262ac2cab98f9a730)): ?>
<?php $component = $__componentOriginald468e2fade69e67273028f1262ac2cab98f9a730; ?>
<?php unset($__componentOriginald468e2fade69e67273028f1262ac2cab98f9a730); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>

    <script src="<?php echo e(asset('public/js/purchases/payments.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/purchases/payments/index.blade.php ENDPATH**/ ?>