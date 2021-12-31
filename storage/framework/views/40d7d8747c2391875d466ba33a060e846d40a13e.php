<?php $__env->startSection('title', trans_choice('general.accounts', 2)); ?>

<?php $__env->startSection('new_button'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-banking-accounts')): ?>
        <a href="<?php echo e(route('accounts.create')); ?>" class="btn btn-success btn-sm"><?php echo e(trans('general.add_new')); ?></a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header border-bottom-0" :class="[{'bg-gradient-primary': bulk_action.show}]">
            <?php echo Form::open([
                'method' => 'GET',
                'route' => 'accounts.index',
                'role' => 'form',
                'class' => 'mb-0'
            ]); ?>

                <div class="align-items-center" v-if="!bulk_action.show">
                    <?php if (isset($component)) { $__componentOriginaldec57d2dc7c3b62478d574f9a4a67fba694d4f23 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SearchString::class, ['model' => 'App\Models\Banking\Account']); ?>
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

                <?php echo e(Form::bulkActionRowGroup('general.accounts', $bulk_actions, ['group' => 'banking', 'type' => 'accounts'])); ?>

            <?php echo Form::close(); ?>

        </div>
        <div class="card-body">
        <div class="list-group">
            <div  class="list-group-item list-group-item-action flex-column align-items-start">
                <small class="float-right text-center text-muted"><?php echo e(Form::bulkActionAllGroup()); ?></small>
            </div>
        <?php 
        $toplam = 0; 
        $toplam2 = 0; 
                    $finans = finans_api();
                    ?>
            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($item->currency_code=="TRY") {
                                if($item->balance<0) {
                                    $toplam2 += $item->balance;
                                } else {
                                    $toplam += $item->balance;
                                }
                            } else {
                                if(!isset($finans[$item->currency_code]['Buying'])) $finans[$item->currency_code]['Buying'] = 1;
                                if($item->balance<0) { 
                                    $toplam2 += $item->balance * $finans[$item->currency_code]['Buying'];
                                } else {
                                    $toplam += $item->balance * $finans[$item->currency_code]['Buying'];
                                }
                                $balance2 = $item->balance * $finans[$item->currency_code]['Buying'];
                            }
                            /*
                            echo $finans[$item->currency_code]['Buying'];
                            echo " ";
                            echo $toplam;
                            */
                            ?>
            <div  class="list-group-item list-group-item-action flex-column align-items-start">
                
                <div  class="d-flex w-100 justify-content-between">
                
                <a href="<?php echo e(route('accounts.show', $item->id)); ?>">
                    <p class="mb-1"><?php echo e($item->name); ?>


                    <br> <small class="text-muted"><?php echo e($item->number); ?></small>
                    </p> <br>
                    
                    <h2 class="mb-1"><?php echo money($item->balance, $item->currency_code, true); ?>
                        <?php if($item->currency_code!="TRY") { ?>
                            (<?php echo money($balance2, "TRY", true); ?>)
                            <?php } ?>

                    </h2>
                </a>
               
                <small class="text-muted text-right">
                <div class="dropdown">
                        <a class="btn btn-neutral btn-sm text-light items-align-center py-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-h text-muted"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="<?php echo e(route('accounts.edit', $item->id)); ?>"><?php echo e(trans('general.edit')); ?></a>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-banking-accounts')): ?>
                                <div class="dropdown-divider"></div>
                                <?php echo Form::deleteLink($item, 'accounts.destroy'); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                     <br>
                    <?php echo e(Form::bulkActionGroup($item->id, $item->name)); ?>

                    <br>
                    <?php if(user()->can('update-banking-accounts')): ?>
                        <?php echo e(Form::enabledGroup($item->id, $item->name, $item->enabled)); ?>

                    <?php else: ?>
                        <?php if($item->enabled): ?>
                            <badge rounded type="success" class="mw-60"><?php echo e(trans('general.yes')); ?></badge>
                        <?php else: ?>
                            <badge rounded type="danger" class="mw-60"><?php echo e(trans('general.no')); ?></badge>
                        <?php endif; ?>
                    <?php endif; ?> 
                    <br>
                    


                </small>
                </div>
              
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
        </div>
        </div>
        <div class="table-responsive d-none">
            <table class="table table-flush table-hover">
                <thead class="thead-light">
                    <tr class="row table-head-line">
                        <th class="col-sm-2 col-md-1 col-lg-1 col-xl-1 d-none d-sm-block"><?php echo e(Form::bulkActionAllGroup()); ?></th>
                        <th class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-3"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name', trans('general.name'), ['filter' => 'active, visible'], ['rel' => 'nofollow']));?></th>
                        <th class="col-md-2 col-lg-2 col-xl-2 d-none d-md-block text-left"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('number', trans('accounts.number')));?></th>
                        <th class="col-xs-4 col-sm-2 col-md-2 col-lg-2 col-xl-1"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('opening_balance', trans('accounts.current_balance')));?></th>
                        <th class="col-sm-2 col-md-2 col-lg-2 col-xl-4 d-none d-sm-block text-right"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('enabled', trans('general.enabled')));?></th>
                        <th class="col-xs-4 col-sm-2 col-md-1 col-lg-1 col-xl-1 text-center"><?php echo e(trans('general.actions')); ?></th>
                    </tr>
                </thead>

                <tbody>
                  
                    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 
                        <tr class="row align-items-center border-top-1">
                            <td class="col-sm-2 col-md-1 col-lg-1 col-xl-1 d-none d-sm-block">
                                <?php echo e(Form::bulkActionGroup($item->id, $item->name)); ?>

                            </td>
                            <td class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-3 long-texts"><a href="<?php echo e(route('accounts.show', $item->id)); ?>"><?php echo e($item->name); ?></a></td>
                            <td class="col-md-2 col-lg-2 col-xl-2 d-none d-md-block text-left"><?php echo e($item->number); ?></td>
                            <td class="col-xs-4 col-sm-2 col-md-1 col-lg-2 col-xl-1"><?php echo money($item->balance, $item->currency_code, true); ?></td>
                           
                            <td class="col-sm-2 col-md-2 col-lg-2 col-xl-4 d-none d-sm-block text-right">
                                <?php if(user()->can('update-banking-accounts')): ?>
                                    <?php echo e(Form::enabledGroup($item->id, $item->name, $item->enabled)); ?>

                                <?php else: ?>
                                    <?php if($item->enabled): ?>
                                        <badge rounded type="success" class="mw-60"><?php echo e(trans('general.yes')); ?></badge>
                                    <?php else: ?>
                                        <badge rounded type="danger" class="mw-60"><?php echo e(trans('general.no')); ?></badge>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <td class="col-xs-4 col-sm-2 col-md-2 col-lg-1 col-xl-1 text-center">
                                <div class="dropdown">
                                    <a class="btn btn-neutral btn-sm text-light items-align-center py-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="<?php echo e(route('accounts.edit', $item->id)); ?>"><?php echo e(trans('general.edit')); ?></a>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-banking-accounts')): ?>
                                            <div class="dropdown-divider"></div>
                                            <?php echo Form::deleteLink($item, 'accounts.destroy'); ?>

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
                
                <?php echo $__env->make('partials.admin.pagination', ['items' => $accounts], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
            </div>
          
            <div class="row">
                <div class="col-12 mt-2 mb-1 text-center">
                    <div class="">Toplam Pozitif Hesap Tutarı:</div>
                </div>
                <div class="col-md-3">
                    <div class="btn btn-block btn-outline-success"><?php echo money($toplam, "TRY", true); ?></div>
                </div>
                <div class="col-md-3">
                    <div class="btn btn-block btn-outline-success"><?php echo money($toplam / $finans['USD']['Buying'], "USD", true); ?></div>
                </div>
                <div class="col-md-3">
                    <div class="btn btn-block btn-outline-success"><?php echo money($toplam / $finans['EUR']['Buying'], "EUR", true); ?></div>
                </div>
                <div class="col-md-3">
                    <div class="btn btn-block btn-outline-success"><?php echo money($toplam / $finans['GBP']['Buying'], "GBP", true); ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-2 mb-1 text-center">
                    <div class="">Toplam Negatif Hesap Tutarı:</div>
                </div>
                <div class="col-md-3">
                    <div class="btn btn-block btn-outline-success"><?php echo money($toplam2, "TRY", true); ?></div>
                </div>
                <div class="col-md-3">
                    <div class="btn btn-block btn-outline-success"><?php echo money($toplam2 / $finans['USD']['Buying'], "USD", true); ?></div>
                </div>
                <div class="col-md-3">
                    <div class="btn btn-block btn-outline-success"><?php echo money($toplam2 / $finans['EUR']['Buying'], "EUR", true); ?></div>
                </div>
                <div class="col-md-3">
                    <div class="btn btn-block btn-outline-success"><?php echo money($toplam2 / $finans['GBP']['Buying'], "GBP", true); ?></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <script src="<?php echo e(asset('public/js/banking/accounts.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/banking/accounts/index.blade.php ENDPATH**/ ?>