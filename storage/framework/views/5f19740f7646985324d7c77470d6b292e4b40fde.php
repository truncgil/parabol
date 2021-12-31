<?php $__env->startSection('title', trans('auth.reset_password')); ?>

<?php $__env->startSection('message', trans('auth.reset_password')); ?>

<?php $__env->startSection('content'); ?>
    <div role="alert" class="alert alert-success d-none" :class="(form.response.success) ? 'show' : ''" v-if="form.response.success" v-html="form.response.message"></div>
    <div role="alert" class="alert alert-danger d-none" :class="(form.response.error) ? 'show' : ''" v-if="form.response.error" v-html="form.response.message"></div>

    <?php echo Form::open([
        'route' => 'forgot',
        'id' => 'forgot',
        '@submit.prevent' => 'onSubmit',
        '@keydown' => 'form.errors.clear($event.target.name)',
        'files' => true,
        'role' => 'form',
        'class' => 'form-loading-button',
        'novalidate' => true
    ]); ?>


        <?php echo $__env->yieldPushContent('email_input_start'); ?>
            <?php echo e(Form::emailGroup('email', false, 'envelope', ['placeholder' => trans('general.email')], null, 'has-feedback', 'input-group-alternative')); ?>

        <?php echo $__env->yieldPushContent('email_input_end'); ?>

        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <?php echo Form::button(
                '<div class="aka-loader"></div> <span>' . trans('general.send') . '</span>',
                [':disabled' => 'form.loading', 'type' => 'submit', 'class' => 'btn btn-success float-right', 'data-loading-text' => trans('general.loading')]); ?>

            </div>
        </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <script src="<?php echo e(asset('public/js/auth/forgot.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/auth/forgot/create.blade.php ENDPATH**/ ?>