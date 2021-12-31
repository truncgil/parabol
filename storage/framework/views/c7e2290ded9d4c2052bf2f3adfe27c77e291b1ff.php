<?php echo $__env->yieldPushContent($name . '_input_start'); ?>

<div
    class="form-group <?php echo e($col); ?><?php echo e(isset($attributes['required']) ? ' required' : ''); ?><?php echo e(isset($attributes['readonly']) ? ' readonly' : ''); ?><?php echo e(isset($attributes['disabled']) ? ' disabled' : ''); ?>"
    :class="[{'has-error': <?php echo e(isset($attributes['v-error']) ? $attributes['v-error'] : 'form.errors.get("' . $name . '")'); ?> }]"
    <?php if(isset($attributes['show'])): ?>
    v-if="<?php echo e($attributes['show']); ?>"
    <?php endif; ?>
    >
    <?php if(!empty($text)): ?>
        <?php echo Form::label($name, $text, ['class' => 'form-control-label']); ?>

    <?php endif; ?>
    <div class="input-group-invoice-text">
        <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $radio_key => $radio_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="custom-control custom-radio mb-2">
                <input 
                    type="radio"
                    name="<?php echo e($name); ?>"
                    id="<?php echo e($name); ?>-<?php echo e($radio_key); ?>"
                    v-model="form.<?php echo e($name); ?>"
                    @change="form.errors.clear('<?php echo e($name); ?>');"
                    class="custom-control-input"
                    <?php if($selected == $radio_key): ?>
                    checked="checked"
                    <?php endif; ?>
                    value="<?php echo e($radio_key); ?>">
                <label for="<?php echo e($name); ?>-<?php echo e($radio_key); ?>" class="custom-control-label"> <?php echo e($radio_value); ?> </label>

                <?php if($radio_key == 'custom'): ?>
                <div :class="[{'has-error': form.errors.get('<?php echo e($input_name); ?>')}, form.<?php echo e($name); ?> == 'custom' ? 'col-md-12' : 'd-none']"
                    style="margin-top: -25px; padding-left: 5.5rem;"
                >
                    <div class="input-group input-group-merge <?php echo e($group_class); ?>">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-<?php echo e($icon); ?>"></i>
                            </span>
                        </div>

                        <?php echo Form::text($input_name, $input_value, [
                            'class' => 'form-control',
                            'data-name' => $input_name,
                            'data-value' => $input_value,
                            'placeholder' => trans('general.form.enter', ['field' => $text]),
                            'v-model' => !empty($attributes['v-model']) ? $attributes['v-model'] : (!empty($attributes['data-field']) ? 'form.' . $attributes['data-field'] . '.'. $input_name : 'form.' . $input_name),
                        ]); ?>

                    </div>

                    <div class="invalid-feedback d-block"
                        v-if="form.errors.has('<?php echo e($input_name); ?>')"
                        v-html="form.errors.get('<?php echo e($input_name); ?>')">
                    </div>
                </div>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="invalid-feedback d-block"
        v-if="<?php echo e(isset($attributes['v-error']) ? $attributes['v-error'] : 'form.errors.has("' . $name . '")'); ?>"
        v-html="<?php echo e(isset($attributes['v-error-message']) ? $attributes['v-error-message'] : 'form.errors.get("' . $name . '")'); ?>">
    </div>
</div>

<?php echo $__env->yieldPushContent($name . '_input_end'); ?>
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/partials/form/invoice_text.blade.php ENDPATH**/ ?>