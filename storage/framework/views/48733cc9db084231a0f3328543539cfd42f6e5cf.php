<?php $__env->startSection('title', trans('general.title.edit', ['type' => trans_choice('general.users', 1)])); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <?php echo Form::model($user, [
            'id' => 'user',
            'method' => 'PATCH',
            'route' => ['users.update', $user->id],
            '@submit.prevent' => 'onSubmit',
            '@keydown' => 'form.errors.clear($event.target.name)',
            'files' => true,
            'role' => 'form',
            'class' => 'form-loading-button',
            'novalidate' => true
        ]); ?>


            <div class="card-body">
                <div class="row">
                    <?php echo e(Form::textGroup('name', trans('general.name'), 'font')); ?>


                    <?php echo e(Form::emailGroup('email', trans('general.email'), 'envelope')); ?>


                    <?php echo e(Form::passwordGroup('password', trans('auth.password.current'), 'key', [])); ?>


                    <?php echo e(Form::passwordGroup('password_confirmation', trans('auth.password.current_confirm'), 'key', [])); ?>


                    <?php echo e(Form::selectGroup('locale', trans_choice('general.languages', 1), 'flag', language()->allowed(), $user->locale)); ?>


                    <?php echo e(Form::selectGroup('landing_page', trans('auth.landing_page'), 'sign-in-alt', $landing_pages, $user->landing_page)); ?>


                    <?php if(setting('default.use_gravatar', '0') == '1'): ?>
                        <?php echo $__env->yieldPushContent('picture_input_start'); ?>
                            <div class="form-group col-md-6 disabled">
                                <?php echo Form::label('picture', trans_choice('general.pictures', 1), ['class' => 'control-label']); ?>

                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-image"></i>
                                        </span>
                                    </div>
                                    <?php echo Form::text('fake_picture', null, ['id' => 'fake_picture', 'class' => 'form-control', 'disabled' => 'disabled', 'placeholder' => trans('settings.default.use_gravatar')]); ?>

                                </div>
                            </div>
                        <?php echo $__env->yieldPushContent('picture_input_end'); ?>
                    <?php else: ?>
                        <?php echo e(Form::fileGroup('picture',  trans_choice('general.pictures', 1), '', ['dropzone-class' => 'form-file'])); ?>

                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read-common-companies')): ?>
                        <?php echo e(Form::multiSelectRemoteGroup('companies', trans_choice('general.companies', 2), 'user', $companies, $user->company_ids, ['required' => 'required', 'disabled' => (in_array('customer', $user->roles()->pluck('name')->toArray())) ? 'true' : 'false', 'remote_action' => route('companies.index')])); ?>

                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read-auth-roles')): ?>
                        <?php echo e(Form::checkboxGroup('roles', trans_choice('general.roles', 2), $roles, 'display_name')); ?>

                    <?php endif; ?>

                    <?php echo e(Form::radioGroup('enabled', trans('general.enabled'), $user->enabled)); ?>

                </div>
            </div>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['update-auth-users', 'update-auth-profile'])): ?>
                <div class="card-footer">
                    <div class="row save-buttons">
                        <?php if(user()->can('read-auth-users')): ?>
                            <?php echo e(Form::saveButtons('users.index')); ?>

                        <?php else: ?>
                            <?php echo e(Form::saveButtons('dashboard')); ?>

                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('stylesheet'); ?>
    <style type="text/css">
        .el-select .el-select__tags > span {
            display: flex;
            margin-bottom: -75px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <script src="<?php echo e(asset('public/js/auth/users.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/auth/users/edit.blade.php ENDPATH**/ ?>