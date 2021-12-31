<?php $__env->startSection('title', trans('general.title.new', ['type' => trans_choice('general.dashboards', 1)])); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <?php echo Form::open([
            'id' => 'dashboard',
            'route' => 'dashboards.store',
            '@submit.prevent' => 'onSubmit',
            '@keydown' => 'form.errors.clear($event.target.name)',
            'files' => true,
            'role' => 'form',
            'class' => 'form-loading-button',
            'novalidate' => true,
        ]); ?>


            <div class="card-body">
                <div class="row">
                    <?php echo e(Form::textGroup('name', trans('general.name'), 'font')); ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read-auth-users')): ?>
                        <?php echo e(Form::checkboxGroup('users', trans_choice('general.users', 2), $users, 'name')); ?>

                    <?php endif; ?>

                    <?php echo e(Form::radioGroup('enabled', trans('general.enabled'), true)); ?>

                </div>
            </div>

            <div class="card-footer">
                <div class="row save-buttons">
                    <?php echo e(Form::saveButtons('dashboards.index')); ?>

                </div>
            </div>
        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <script src="<?php echo e(asset('public/js/common/dashboards.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/common/dashboards/create.blade.php ENDPATH**/ ?>