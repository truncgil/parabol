<?php $__env->startSection('title', trans('auth.reset_password')); ?>

<?php $__env->startSection('message', trans('auth.reset_password')); ?>

<?php $__env->startSection('content'); ?>
    <div role="alert" class="alert alert-danger d-none" :class="(form.response.error) ? 'show' : ''" v-if="form.response.error" v-html="form.response.message"></div>

    <?php echo Form::open([
        'route' => 'reset.store',
        'id' => 'reset',
        '@submit.prevent' => 'onSubmit',
        '@keydown' => 'form.errors.clear($event.target.name)',
        'files' => true,
        'role' => 'form',
        'class' => 'form-loading-button',
        'novalidate' => true
    ]); ?>


        <input type="hidden" name="token" value="<?php echo e($token); ?>">

        <?php echo $__env->yieldPushContent('email_input_start'); ?>
            <?php echo e(Form::emailGroup('email', false, 'envelope', ['placeholder' => trans('general.email')], null, 'has-feedback', 'input-group-alternative')); ?>

        <?php echo $__env->yieldPushContent('email_input_end'); ?>

        <?php echo $__env->yieldPushContent('password_input_start'); ?>
            <?php echo e(Form::passwordGroup('password', false, 'unlock-alt', ['placeholder' => trans('auth.password.new')], 'has-feedback', 'input-group-alternative')); ?>

        <?php echo $__env->yieldPushContent('password_input_end'); ?>

        <?php echo $__env->yieldPushContent('password_confirmation_input_start'); ?>
            <?php echo e(Form::passwordGroup('password_confirmation', false, 'unlock-alt', ['placeholder' => trans('auth.password.new_confirm')], 'has-feedback', 'input-group-alternative')); ?>

        <?php echo $__env->yieldPushContent('password_confirmation_input_end'); ?>

        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <?php echo Form::button(
                '<div class="aka-loader"></div> <span>' . trans('auth.reset') . '</span>',
                [':disabled' => 'form.loading', 'type' => 'submit', 'class' => 'btn btn-success float-right', 'data-loading-text' => trans('general.loading')]); ?>

            </div>
        </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <script src="<?php echo e(asset('public/js/auth/reset.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/auth/reset/create.blade.php ENDPATH**/ ?>