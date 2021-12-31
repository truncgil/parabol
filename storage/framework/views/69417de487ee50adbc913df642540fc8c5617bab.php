<?php $__env->startSection('title', trans('general.title.edit', ['type' => trans_choice('general.categories', 1)])); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <?php echo Form::model($category, [
            'id' => 'category',
            'method' => 'PATCH',
            'route' => ['categories.update', $category->id],
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


                    <?php if($type_disabled): ?>
                        <?php echo e(Form::selectGroup('type', trans_choice('general.types', 1), 'bars', $types, $category->type, ['required' => 'required', 'disabled' => 'true'])); ?>

                        <input type="hidden" name="type" value="<?php echo e($category->type); ?>" />
                    <?php else: ?>
                        <?php echo e(Form::selectGroup('type', trans_choice('general.types', 1), 'bars', $types, $category->type)); ?>

                    <?php endif; ?>

                    <?php echo $__env->yieldPushContent('color_input_start'); ?>
                        <div class="form-group col-md-6 required <?php echo e($errors->has('color') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('color', trans('general.color'), ['class' => 'form-control-label']); ?>

                            <div class="input-group input-group-merge" id="category-color-picker">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <el-color-picker v-model="color" size="mini" :predefine="predefineColors" @change="onChangeColor"></el-color-picker>
                                    </span>
                                </div>
                                <?php echo Form::text('color', $category->color, ['@input' => 'onChangeColorInput', 'id' => 'color', 'class' => 'form-control color-hex', 'required' => 'required']); ?>

                            </div>
                            <?php echo $errors->first('color', '<p class="help-block">:message</p>'); ?>

                        </div>
                    <?php echo $__env->yieldPushContent('color_input_end'); ?>

                    <?php echo e(Form::radioGroup('enabled', trans('general.enabled'), $category->enabled)); ?>

                </div>
            </div>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-settings-categories')): ?>
                <div class="card-footer">
                    <div class="row save-buttons">
                        <?php echo e(Form::saveButtons('categories.index')); ?>

                    </div>
                </div>
            <?php endif; ?>
        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <script src="<?php echo e(asset('public/js/settings/categories.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/settings/categories/edit.blade.php ENDPATH**/ ?>