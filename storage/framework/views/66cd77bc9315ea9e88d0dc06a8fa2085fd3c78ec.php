<?php $__env->startSection('title', trans_choice('general.dashboards', 2)); ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-common-dashboards')): ?>
    <?php $__env->startSection('new_button'); ?>
        <a href="<?php echo e(route('dashboards.create')); ?>" class="btn btn-success btn-sm"><?php echo e(trans('general.add_new')); ?></a>
    <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header border-bottom-0" :class="[{'bg-gradient-primary': bulk_action.show}]">
            <?php echo Form::open([
                'method' => 'GET',
                'route' => 'dashboards.index',
                'role' => 'form',
                'class' => 'mb-0'
            ]); ?>

                <div class="align-items-center" v-if="!bulk_action.show">
                    <?php if (isset($component)) { $__componentOriginaldec57d2dc7c3b62478d574f9a4a67fba694d4f23 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SearchString::class, ['model' => 'App\Models\Common\Dashboard']); ?>
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

                <?php echo e(Form::bulkActionRowGroup('general.dashboards', $bulk_actions, ['group' => 'common', 'type' => 'dashboards'])); ?>

            <?php echo Form::close(); ?>

        </div>

        <div class="table-responsive">
            <table class="table table-flush table-hover">
                <thead class="thead-light">
                    <tr class="row table-head-line">
                        <th class="col-sm-3 col-md-2 col-lg-1 col-xl-1 d-none d-sm-block"><?php echo e(Form::bulkActionAllGroup()); ?></th>
                        <th class="col-xs-4 col-sm-3 col-md-6 col-lg-7 col-xl-7 long-texts"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name', trans('general.name')));?></th>
                        <th class="col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xl-2"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('enabled', trans('general.enabled')));?></th>
                        <th class="col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xl-2 text-center"><?php echo e(trans('general.actions')); ?></th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $dashboards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="row align-items-center border-top-1">
                            <td class="col-sm-3 col-md-2 col-lg-1 col-xl-1 d-none d-sm-block">
                                <?php echo e(Form::bulkActionGroup($item->id, $item->name)); ?>

                            </td>
                            <td class="col-xs-4 col-sm-3 col-md-6 col-lg-7 col-xl-7 long-texts"><a href="<?php echo e(route('dashboards.edit', $item->id)); ?>"><?php echo e($item->name); ?></a></td>
                            <td class="col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xl-2">
                                <?php if(user()->can('update-common-dashboards')): ?>
                                    <?php echo e(Form::enabledGroup($item->id, $item->name, $item->enabled)); ?>

                                <?php else: ?>
                                    <?php if($item->enabled): ?>
                                        <badge rounded type="success" class="mw-60"><?php echo e(trans('general.yes')); ?></badge>
                                    <?php else: ?>
                                        <badge rounded type="danger" class="mw-60"><?php echo e(trans('general.no')); ?></badge>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <td class="col-xs-4 col-sm-3 col-md-2 col-lg-2 col-xl-2 text-center">
                                <div class="dropdown">
                                    <a class="btn btn-neutral btn-sm text-light items-align-center py-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <?php if($item->enabled): ?>
                                            <a  class="dropdown-item" href="<?php echo e(route('dashboards.switch', $item->id)); ?>"><?php echo e(trans('general.switch')); ?></a>
                                            <div class="dropdown-divider"></div>
                                        <?php endif; ?>
                                        <a class="dropdown-item" href="<?php echo e(route('dashboards.edit', $item->id)); ?>"><?php echo e(trans('general.edit')); ?></a>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-common-dashboards')): ?>
                                            <div class="dropdown-divider"></div>
                                            <?php echo Form::deleteLink($item, 'dashboards.destroy'); ?>

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
                <?php echo $__env->make('partials.admin.pagination', ['items' => $dashboards], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <script src="<?php echo e(asset('public/js/common/dashboards.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/common/dashboards/index.blade.php ENDPATH**/ ?>