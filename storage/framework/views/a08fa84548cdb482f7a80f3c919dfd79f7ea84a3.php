<?php $__env->startSection('title', trans('general.title.edit', ['type' => trans_choice('general.customers', 1)])); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <?php echo Form::model($customer, [
            'method' => 'PATCH',
            'route' => ['customers.update', $customer->id],
            'role' => 'form',
            'id' => 'customer',
            '@submit.prevent' => 'onSubmit',
            '@keydown' => 'form.errors.clear($event.target.name)',
            'class' => 'form-loading-button',
            'novalidate' => 'true'
        ]); ?>


        <div class="card-body">
            <div class="row">
                <?php echo e(Form::textGroup('name', trans('general.name'), 'user')); ?>


                <?php echo e(Form::textGroup('email', trans('general.email'), 'envelope', [])); ?>


                <?php echo e(Form::textGroup('tax_number', trans('general.tax_number'), 'percent', [])); ?>


                <?php echo e(Form::selectAddNewGroup('currency_code', trans_choice('general.currencies', 1), 'exchange-alt', $currencies, $customer->currency_code, ['required' => 'required', 'path' => route('modals.currencies.create'), 'field' => ['key' => 'code', 'value' => 'name']])); ?>


                <?php echo e(Form::textGroup('phone', trans('general.phone'), 'phone', [])); ?>


                <?php echo e(Form::textGroup('website', trans('general.website'), 'globe',[])); ?>


                <?php echo e(Form::textareaGroup('address', trans('general.address'))); ?>


                <?php echo e(Form::textGroup('reference', trans('general.reference'), 'file', [])); ?>


                <?php echo e(Form::radioGroup('enabled', trans('general.enabled'), $customer->enabled)); ?>


                <?php echo $__env->yieldPushContent('create_user_input_start'); ?>
                    <div id="customer-create-user" class="form-group col-md-12 margin-top">
                        <div class="custom-control custom-checkbox">
                            <?php if($customer->user_id): ?>
                                <?php echo e(Form::checkbox('create_user', '1', 1, [
                                    'id' => 'create_user',
                                    'class' => 'custom-control-input',
                                    'disabled' => 'true'
                                ])); ?>


                                <label class="custom-control-label" for="create_user">
                                    <strong><?php echo e(trans('customers.user_created')); ?></strong>
                                </label>
                            <?php else: ?>
                                <?php echo e(Form::checkbox('create_user', '1', null, [
                                    'id' => 'create_user',
                                    'class' => 'custom-control-input',
                                    'v-on:input' => 'onCanLogin($event)'
                                ])); ?>


                                <label class="custom-control-label" for="create_user">
                                    <strong><?php echo e(trans('customers.can_login')); ?></strong>
                                </label>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php echo $__env->yieldPushContent('create_user_input_end'); ?>

                <div v-if="can_login" class="row col-md-12">
                    <?php echo e(Form::passwordGroup('password', trans('auth.password.current'), 'key', ['required' => 'required'], 'col-md-6 password')); ?>


                    <?php echo e(Form::passwordGroup('password_confirmation', trans('auth.password.current_confirm'), 'key', ['required' => 'required'], 'col-md-6 password')); ?>

                </div>
            </div>
        </div>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-sales-customers')): ?>
            <div class="card-footer">
                <div class="row save-buttons">
                    <?php echo e(Form::saveButtons('customers.index')); ?>

                </div>
            </div>
        <?php endif; ?>

        <?php echo e(Form::hidden('type', 'customer')); ?>


        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <script src="<?php echo e(asset('public/js/sales/customers.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/sales/customers/edit.blade.php ENDPATH**/ ?>