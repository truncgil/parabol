<?php $__env->startSection('title', trans_choice('general.customers', 2)); ?>

<?php $__env->startSection('new_button'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-sales-customers')): ?>
        <a href="<?php echo e(route('customers.create')); ?>" class="btn btn-success btn-sm"><?php echo e(trans('general.add_new')); ?></a>
        <a href="<?php echo e(route('import.create', ['group' => 'sales', 'type' => 'customers'])); ?>" class="btn btn-white btn-sm"><?php echo e(trans('import.import')); ?></a>
    <?php endif; ?>
    <a href="<?php echo e(route('customers.export', request()->input())); ?>" class="btn btn-white btn-sm"><?php echo e(trans('general.export')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if($customers->count() || request()->get('search', false)): ?>
    <div class="">
                <div class="card">
                        <div class="card-header border-bottom-0" :class="[{'bg-gradient-primary': bulk_action.show}]">
                            <?php echo Form::open([
                                'method' => 'GET',
                                'route' => 'customers.index',
                                'role' => 'form',
                                'class' => 'mb-0'
                            ]); ?>

                                <div class="align-items-center" v-if="!bulk_action.show">
                                    <?php if (isset($component)) { $__componentOriginaldec57d2dc7c3b62478d574f9a4a67fba694d4f23 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SearchString::class, ['model' => 'App\Models\Common\Contact']); ?>
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

                                <?php echo e(Form::bulkActionRowGroup('general.customers', $bulk_actions, ['group' => 'sales', 'type' => 'customers'])); ?>

                            <?php echo Form::close(); ?>

                        </div>

                </div>
               <div class="card-content">
               <div class="row">

               <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <div class="col-12">
                    <div class="card card-body mt-1">
                            <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                <div class="media-body">
                                <div class="dropdown" style="position: absolute;
    right: 5px;
    top: 5px;">
                                        <a class="btn btn-neutral btn-sm text-light items-align-center py-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-muted"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="<?php echo e(route('customers.show', $item->id)); ?>">
                                                <?php echo e(trans('general.show')); ?>

                                            </a>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-sales-customers')): ?>
                                                <a class="dropdown-item" href="<?php echo e(route('customers.edit', $item->id)); ?>">
                                                    <?php echo e(trans('general.edit')); ?>

                                                </a>
                                            <?php endif; ?>

                                            <div class="dropdown-divider"></div>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-sales-customers')): ?>
                                                <a class="dropdown-item" href="<?php echo e(route('customers.duplicate', $item->id)); ?>">
                                                    <?php echo e(trans('general.duplicate')); ?>

                                                </a>

                                                <div class="dropdown-divider"></div>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-sales-customers')): ?>
                                                <?php echo Form::deleteLink($item, 'customers.destroy'); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <h6 class="media-title font-weight-semibold">  </h6>
                              
                                    <p class="mb-3"><a href="<?php echo e(route('customers.show', $item->id)); ?>" data-abc="true"><?php echo e($item->name); ?></a></p>
                                    <ul class="list-inline list-inline-dotted mb-0">
                                        <li class="list-inline-item">
                                            <el-tooltip content="<?php echo e(!empty($item->phone) ? $item->phone : trans('general.na')); ?>"
                                                effect="dark"
                                                placement="top">
                                                <span><?php echo e(!empty($item->email) ? $item->email : ""); ?></span>
                                            </el-tooltip>    

                                        </li>
                                    </ul>
                                </div>
                                <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                    <div style="position: absolute;
    left: 10px;
    top: 5px;">
                                    <?php echo e(Form::bulkActionGroup($item->id, $item->name)); ?>

                                    </div>
                                    <h3 class="mb-0 font-weight-semibold"><?php echo money($item->unpaid, setting('default.currency'), true); ?></h3>
                                    <div style="position: absolute;
    right: 10px;
    bottom: 10px;">
                                    <?php if(user()->can('update-sales-customers')): ?>
                                        <?php echo e(Form::enabledGroup($item->id, $item->name, $item->enabled)); ?>

                                    <?php else: ?>
                                        <?php if($item->enabled): ?>
                                            <badge rounded type="success" class="mw-60 d-inline-block"><?php echo e(trans('general.yes')); ?></badge>
                                        <?php else: ?>
                                            <badge rounded type="danger" class="mw-60 d-inline-block"><?php echo e(trans('general.no')); ?></badge>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                   </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    
               </div>
               </div>
               <div class="card-footer table-action">
                    <div class="row">
                        <?php echo $__env->make('partials.admin.pagination', ['items' => $customers], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        <div class="card d-none">
            <div class="card-header border-bottom-0" :class="[{'bg-gradient-primary': bulk_action.show}]">
                <?php echo Form::open([
                    'method' => 'GET',
                    'route' => 'customers.index',
                    'role' => 'form',
                    'class' => 'mb-0'
                ]); ?>

                    <div class="align-items-center" v-if="!bulk_action.show">
                        <?php if (isset($component)) { $__componentOriginaldec57d2dc7c3b62478d574f9a4a67fba694d4f23 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SearchString::class, ['model' => 'App\Models\Common\Contact']); ?>
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

                    <?php echo e(Form::bulkActionRowGroup('general.customers', $bulk_actions, ['group' => 'sales', 'type' => 'customers'])); ?>

                <?php echo Form::close(); ?>

            </div>
            
            <div class="table-responsive hide-mobile">
                <table class="table table-flush table-hover">
                    <thead class="thead-light">
                        <tr class="row table-head-line">
                            <th class="col-sm-2 col-md-1 col-lg-1 col-xl-1 d-none d-sm-block"><?php echo e(Form::bulkActionAllGroup()); ?></th>
                            <th class="col-xs-4 col-sm-3 col-md-4 col-lg-3 col-xl-3"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name', trans('general.name'), ['filter' => 'active, visible'], ['class' => 'col-aka', 'rel' => 'nofollow']));?></th>
                            <th class="col-md-3 col-lg-3 col-xl-3 d-none d-md-block"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('email', trans('general.email')));?></th>
                            <th class="col-lg-2 col-xl-2 d-none d-lg-block text-right"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('unpaid', trans('general.unpaid')));?></th>
                            <th class="col-xs-4 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-center"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('enabled', trans('general.enabled')));?></th>
                            <th class="col-xs-4 col-sm-2 col-md-2 col-lg-1 col-xl-1 text-center"><?php echo e(trans('general.actions')); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                  <?php $c = array();
                  $k=0;
                  //print2($customers);
                  foreach($customers AS $item) {
                      $c[$k]['id'] = $item->id;
                      $c[$k]['name'] = $item->name;
                      $c[$k]['email'] = $item->email;
                      $c[$k]['unpaid'] = $item->unpaid;
                      $c[$k]['enabled'] = $item->enabled;
                      $k++;
                  }
                 
                 // print2($c);
                  ?>
                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       
                       
                            <tr class="row align-items-center border-top-1">
                                <td class="col-sm-2 col-md-1 col-lg-1 col-xl-1 d-none d-sm-block">
                               
                                    <?php echo e(Form::bulkActionGroup($item->id, $item->name)); ?>

                                </td>

                                <td class="col-xs-4 col-sm-3 col-md-4 col-lg-3 col-xl-3">
                                    <a class="col-aka long-texts d-block" href="<?php echo e(route('customers.show', $item->id)); ?>"><?php echo e($item->name); ?></a>
                                </td>

                                <td class="col-md-3 col-lg-3 col-xl-3 d-none d-md-block long-texts">
                                    <el-tooltip content="<?php echo e(!empty($item->phone) ? $item->phone : trans('general.na')); ?>"
                                        effect="dark"
                                        placement="top">
                                        <span><?php echo e(!empty($item->email) ? $item->email : trans('general.na')); ?></span>
                                    </el-tooltip>
                                </td>

                                <td class="col-lg-2 col-xl-2 d-none d-lg-block text-right long-texts">
                               
                                    <?php echo money($item->unpaid, setting('default.currency'), true); ?>
                                </td>

                                <td class="col-xs-4 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-center">
                                    <?php if(user()->can('update-sales-customers')): ?>
                                        <?php echo e(Form::enabledGroup($item->id, $item->name, $item->enabled)); ?>

                                    <?php else: ?>
                                        <?php if($item->enabled): ?>
                                            <badge rounded type="success" class="mw-60 d-inline-block"><?php echo e(trans('general.yes')); ?></badge>
                                        <?php else: ?>
                                            <badge rounded type="danger" class="mw-60 d-inline-block"><?php echo e(trans('general.no')); ?></badge>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>

                                <td class="col-xs-4 col-sm-2 col-md-2 col-lg-1 col-xl-1 text-center">
                                    <div class="dropdown">
                                        <a class="btn btn-neutral btn-sm text-light items-align-center py-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-muted"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="<?php echo e(route('customers.show', $item->id)); ?>">
                                                <?php echo e(trans('general.show')); ?>

                                            </a>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-sales-customers')): ?>
                                                <a class="dropdown-item" href="<?php echo e(route('customers.edit', $item->id)); ?>">
                                                    <?php echo e(trans('general.edit')); ?>

                                                </a>
                                            <?php endif; ?>

                                            <div class="dropdown-divider"></div>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-sales-customers')): ?>
                                                <a class="dropdown-item" href="<?php echo e(route('customers.duplicate', $item->id)); ?>">
                                                    <?php echo e(trans('general.duplicate')); ?>

                                                </a>

                                                <div class="dropdown-divider"></div>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-sales-customers')): ?>
                                                <?php echo Form::deleteLink($item, 'customers.destroy'); ?>

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
                    <?php echo $__env->make('partials.admin.pagination', ['items' => $customers], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?php if (isset($component)) { $__componentOriginald468e2fade69e67273028f1262ac2cab98f9a730 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\EmptyPage::class, ['group' => 'sales','page' => 'customers']); ?>
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
    <script src="<?php echo e(asset('public/js/sales/customers.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/sales/customers/index.blade.php ENDPATH**/ ?>