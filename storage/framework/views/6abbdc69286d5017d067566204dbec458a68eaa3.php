<div id="widget-<?php echo e($class->model->id); ?>" class="<?php echo e($class->model->settings->width); ?>">
    <div class="card bg-gradient-success card-stats">
        <?php echo $__env->make($class->views['header'], ['header_class' => 'border-bottom-0'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h5 class="text-uppercase text-white mb-0"><?php echo e($class->model->name); ?></h5>
                    <span class="font-weight-bold text-white mb-0"><?php echo e($totals['grand']); ?></span>
                </div>

                <div class="col-auto">
                    <div class="icon icon-shape bg-white text-success rounded-circle shadow">
                        <i class="fa fa-heart"></i>
                    </div>
                </div>
            </div>

            <p class="mt-3 mb-0 text-sm cursor-default">
                <span class="text-white"><?php echo e(trans('general.upcoming')); ?></span>
                <el-tooltip
                content="<?php echo e(trans('widgets.open_profit')); ?>: <?php echo e($totals['open']); ?> / <?php echo e(trans('widgets.overdue_profit')); ?>: <?php echo e($totals['overdue']); ?>"
                effect="dark"
                :open-delay="100"
                placement="top">
                    <span class="text-white font-weight-bold float-right"><?php echo e($totals['open']); ?> / <?php echo e($totals['overdue']); ?></span>
                </el-tooltip>
            </p>
        </div>
    </div>
</div>
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/widgets/total_profit.blade.php ENDPATH**/ ?>