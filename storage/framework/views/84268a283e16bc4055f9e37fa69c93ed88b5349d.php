<?php $__env->startSection('title', trans_choice('general.items', 2)); ?>

<?php $__env->startSection('new_button'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-common-items')): ?>
        <a href="<?php echo e(route('items.create')); ?>" class="btn btn-success btn-sm"><?php echo e(trans('general.add_new')); ?></a>
        <a href="<?php echo e(route('import.create', ['common', 'items'])); ?>" class="btn btn-white btn-sm"><?php echo e(trans('import.import')); ?></a>
    <?php endif; ?>
    <a href="<?php echo e(route('items.export', request()->input())); ?>" class="btn btn-white btn-sm"><?php echo e(trans('general.export')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if($items->count() || request()->get('search', false)): ?>
        <div class="card">
            <div class="card-header border-bottom-0" :class="[{'bg-gradient-primary': bulk_action.show}]">
                <?php echo Form::open([
                    'method' => 'GET',
                    'route' => 'items.index',
                    'role' => 'form',
                    'class' => 'mb-0'
                ]); ?>

                    <div class="align-items-center" v-if="!bulk_action.show">
                        <?php if (isset($component)) { $__componentOriginaldec57d2dc7c3b62478d574f9a4a67fba694d4f23 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SearchString::class, ['model' => 'App\Models\Common\Item']); ?>
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

                    <?php echo e(Form::bulkActionRowGroup('general.items', $bulk_actions, ['group' => 'common', 'type' => 'items'])); ?>

                <?php echo Form::close(); ?>

            </div>

            <div class="table-responsive">
                <table class="table table-flush table-hover">
                    <thead class="thead-light">
                        <tr class="row table-head-line">
                            <th class="col-sm-2 col-md-1 col-lg-1 col-xl-1 d-none d-sm-block"><?php echo e(Form::bulkActionAllGroup()); ?></th>
                            <th class="col-xs-4 col-sm-4 col-md-4 col-lg-3 col-xl-3"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name', trans('general.name'), ['filter' => 'active, visible'], ['class' => 'col-aka', 'rel' => 'nofollow']));?></th>
                            <th class="col-lg-1 col-xl-2 d-none d-lg-block"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('category', trans_choice('general.categories', 1)));?></th>
                            <th class="col-md-3 col-lg-3 col-xl-2 text-right d-none d-md-block"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('sale_price', trans('items.sales_price')));?></th>
                            <th class="col-lg-2 col-xl-2 text-right d-none d-lg-block"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('purchase_price', trans('items.purchase_price')));?></th>
                            <th class="col-xs-4 col-sm-3 col-md-2 col-lg-1 col-xl-1 text-center"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('enabled', trans('general.enabled')));?></th>
                            <th class="col-xs-4 col-sm-3 col-md-2 col-lg-1 col-xl-1 text-center"><a><?php echo e(trans('general.actions')); ?></a></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="row align-items-center border-top-1">
                                <td class="col-sm-2 col-md-1 col-lg-1 col-xl-1 d-none d-sm-block">
                                    <?php echo e(Form::bulkActionGroup($item->id, $item->name)); ?>

                                </td>
                                <td class="col-xs-4 col-sm-4 col-md-4 col-lg-3 col-xl-3 py-2">
                                    <img src="<?php echo e($item->picture ? Storage::url($item->picture->id) : asset('public/img/icon-dark.svg')); ?>" class="avatar image-style p-1 mr-3 item-img col-aka d-none d-md-inline" alt="<?php echo e($item->name); ?>">
                                    <a href="<?php echo e(route('items.edit', $item->id)); ?>"><?php echo e($item->name); ?></a>
                                </td>
                                <td class="col-lg-1 col-xl-2 d-none d-lg-block long-texts">
                                    <?php echo e($item->category->name); ?>

                                </td>
                                <td class="col-md-3 col-lg-3 col-xl-2 text-right d-none d-md-block">
                                    <?php echo e(money($item->sale_price, setting('default.currency'), true)); ?>

                                </td>
                                <td class="col-lg-2 col-xl-2 text-right d-none d-lg-block">
                                    <?php echo e(money($item->purchase_price, setting('default.currency'), true)); ?>

                                </td>
                                <td class="col-xs-4 col-sm-3 col-md-2 col-lg-1 col-xl-1 text-center">
                                    <?php if(user()->can('update-common-items')): ?>
                                        <?php echo e(Form::enabledGroup($item->id, $item->name, $item->enabled)); ?>

                                    <?php else: ?>
                                        <?php if($item->enabled): ?>
                                            <badge rounded type="success" class="mw-60"><?php echo e(trans('general.yes')); ?></badge>
                                        <?php else: ?>
                                            <badge rounded type="danger" class="mw-60"><?php echo e(trans('general.no')); ?></badge>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td class="col-xs-4 col-sm-3 col-md-2 col-lg-1 col-xl-1 text-center">
                                    <div class="dropdown">
                                        <a class="btn btn-neutral btn-sm text-light items-align-center p-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-muted"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="<?php echo e(route('items.edit', $item->id)); ?>"><?php echo e(trans('general.edit')); ?></a>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-common-items')): ?>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="<?php echo e(route('items.duplicate', $item->id)); ?>"><?php echo e(trans('general.duplicate')); ?></a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-common-items')): ?>
                                                <div class="dropdown-divider"></div>
                                                <?php echo Form::deleteLink($item, 'items.destroy'); ?>

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
                <div class="row align-items-center">
                    <?php echo $__env->make('partials.admin.pagination', ['items' => $items], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?php if (isset($component)) { $__componentOriginald468e2fade69e67273028f1262ac2cab98f9a730 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\EmptyPage::class, ['page' => 'items']); ?>
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
    <script src="<?php echo e(asset('public/js/common/items.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/common/items/index.blade.php ENDPATH**/ ?>