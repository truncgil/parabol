<?php echo Form::open([
    'id' => 'form-create-category',
    '@submit.prevent' => 'onSubmit',
    '@keydown' => 'form.errors.clear($event.target.name)',
    'role' => 'form',
    'class' => 'form-loading-button',
    'route' => 'categories.store',
    'novalidate' => true
]); ?>

    <div class="row">
        <?php echo e(Form::textGroup('name', trans('general.name'), 'font')); ?>


        <?php echo $__env->yieldPushContent('color_input_start'); ?>
            <div class="form-group col-md-6 required <?php echo e($errors->has('color') ? 'has-error' : ''); ?>">
                <?php echo Form::label('color', trans('general.color'), ['class' => 'form-control-label']); ?>

                <div class="input-group input-group-merge" id="category-color-picker">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <el-color-picker v-model="color" size="mini" :predefine="predefineColors" @change="onChangeColor"></el-color-picker>
                        </span>
                    </div>
                    <?php echo Form::text('color', '#55588b', ['v-model' => 'form.color', '@input' => 'onChangeColorInput', 'id' => 'color', 'class' => 'form-control color-hex', 'required' => 'required']); ?>

                </div>
                <?php echo $errors->first('color', '<p class="help-block">:message</p>'); ?>

            </div>
        <?php echo $__env->yieldPushContent('color_input_end'); ?>

        <?php echo Form::hidden('type', $type, []); ?>

        <?php echo Form::hidden('enabled', '1', []); ?>

    </div>
<?php echo Form::close(); ?>

<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/modals/categories/create.blade.php ENDPATH**/ ?>