<?php $__env->startSection('title', $class->model->name); ?>

<?php $__env->startSection('content'); ?>
    <h2><?php echo e($class->model->name); ?></h2>

    <?php echo e(setting('company.name')); ?>


    <?php if(!empty($class->model->settings->chart)): ?>
        <?php echo $__env->make($class->views['chart'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->make($class->views['content'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.print', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/partials/reports/print.blade.php ENDPATH**/ ?>