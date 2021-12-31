<?php $__env->startSection('title', trans_choice('general.currencies', 2)); ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-settings-currencies')): ?>
    <?php $__env->startSection('new_button'); ?>
        <a href="<?php echo e(route('currencies.create')); ?>" class="btn btn-success btn-sm"><?php echo e(trans('general.add_new')); ?></a>
       
        <a onclick="$(this).html('İşlem yapılıyor...');$.get('<?php echo e(url("/custom/cron")); ?>',function(d){
            location.reload();
        })" class="btn btn-white btn-sm">
        <i class="fa fa-sync"></i>
        Kurları
        <img src="https://finans.truncgil.com/logo.svg" height="16">
        'dan Güncelle</a>
        <script>
            $(function(){
                $(".btn:contains('Live Currency')").hide();
            });
        </script>
    <?php $__env->stopSection(); ?>
    
<?php endif; ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header border-bottom-0" :class="[{'bg-gradient-primary': bulk_action.show}]">
            <?php echo Form::open([
                'method' => 'GET',
                'route' => 'currencies.index',
                'role' => 'form',
                'class' => 'mb-0'
            ]); ?>

                <div class="align-items-center" v-if="!bulk_action.show">
                    <?php if (isset($component)) { $__componentOriginaldec57d2dc7c3b62478d574f9a4a67fba694d4f23 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SearchString::class, ['model' => 'App\Models\Setting\Currency']); ?>
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

                <?php echo e(Form::bulkActionRowGroup('general.currencies', $bulk_actions, ['group' => 'settings', 'type' => 'currencies'])); ?>

            <?php echo Form::close(); ?>

        </div>

        <div class="table-responsive">
            <table class="table table-flush table-hover">
                <thead class="thead-light">
                    <tr class="row table-head-line">
                        <th class="col-sm-2 col-md-2 col-lg-1 d-none d-sm-block"><?php echo e(Form::bulkActionAllGroup()); ?></th>
                        <th class="col-xs-4 col-sm-3 col-md-2 col-lg-4"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name', trans('general.name'), ['filter' => 'active, visible'], ['class' => 'col-aka', 'rel' => 'nofollow']));?></th>
                        <th class="col-md-2 col-lg-2 d-none d-md-block"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('code', trans('currencies.code')));?></th>
                        <th class="col-sm-2 col-md-2 col-lg-2 d-none d-sm-block"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('rate', trans('currencies.rate')));?></th>
                        <th class="col-xs-4 col-sm-3 col-md-2 col-lg-2"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('enabled', trans('general.enabled')));?></th>
                        <th class="col-xs-4 col-sm-2 col-md-2 col-lg-1 text-center"><?php echo e(trans('general.actions')); ?></th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="row align-items-center border-top-1">
                            <td class="col-sm-2 col-md-2 col-lg-1 d-none d-sm-block">
                                <?php echo e(Form::bulkActionGroup($item->id, $item->name)); ?>

                            </td>
                            <td class="col-xs-4 col-sm-3 col-md-2 col-lg-4"><a class="col-aka" href="<?php echo e(route('currencies.edit', $item->id)); ?>"><?php echo e($item->name); ?></a></td>
                            <td class="col-md-2  col-lg-2 d-none d-md-block"><?php echo e($item->code); ?></td>
                            <td class="col-sm-2 col-md-2 col-lg-2 d-none d-sm-block"><?php echo e($item->rate); ?></td>
                            <td class="col-xs-4 col-sm-3 col-md-2 col-lg-2">
                                <?php if(user()->can('update-settings-currencies')): ?>
                                    <?php echo e(Form::enabledGroup($item->id, $item->name, $item->enabled)); ?>

                                <?php else: ?>
                                    <?php if($item->enabled): ?>
                                        <badge rounded type="success" class="mw-60"><?php echo e(trans('general.yes')); ?></badge>
                                    <?php else: ?>
                                        <badge rounded type="danger" class="mw-60"><?php echo e(trans('general.no')); ?></badge>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <td class="col-xs-4 col-sm-2 col-md-2 col-lg-1 text-center">
                                <div class="dropdown">
                                    <a class="btn btn-neutral btn-sm text-light items-align-center py-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="<?php echo e(route('currencies.edit', $item->id)); ?>"><?php echo e(trans('general.edit')); ?></a>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-settings-currencies')): ?>
                                        <div class="dropdown-divider"></div>
                                        <?php echo Form::deleteLink($item, 'currencies.destroy'); ?>

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
                <?php echo $__env->make('partials.admin.pagination', ['items' => $currencies], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <script src="<?php echo e(asset('public/js/settings/currencies.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/settings/currencies/index.blade.php ENDPATH**/ ?>