<?php echo $__env->yieldPushContent($name . '_input_start'); ?>

    <akaunting-select
        class="<?php echo e($col); ?><?php echo e(isset($attributes['required']) ? ' required' : ''); ?><?php echo e(isset($attributes['disabled']) ? ' disabled' : ''); ?>"

        <?php if(!empty($attributes['v-error'])): ?>
        :form-classes="[{'has-error': <?php echo e($attributes['v-error']); ?> }]"
        <?php else: ?>
        :form-classes="[{'has-error': form.errors.has('<?php echo e($name); ?>') }]"
        <?php endif; ?>

        icon="<?php echo e($icon); ?>"
        title="<?php echo e($text); ?>"
        placeholder="<?php echo e(trans('general.form.select.field', ['field' => $text])); ?>"
        name="<?php echo e($name); ?>"
        :options="<?php echo e(json_encode($values)); ?>"

        <?php if(isset($attributes['disabledOptions'])): ?>
        :disabled-options="<?php echo e(json_encode($attributes['disabledOptions'])); ?>"
        <?php endif; ?>

        <?php if(isset($attributes['dynamicOptions'])): ?>
        :dynamic-options="<?php echo e($attributes['dynamicOptions']); ?>"
        <?php endif; ?>

        <?php if(isset($selected) || old($name)): ?>
        value="<?php echo e(old($name, $selected)); ?>"
        <?php endif; ?>

        <?php if(!empty($attributes['model'])): ?>
        :model="<?php echo e($attributes['model']); ?>"
        <?php endif; ?>

        :add-new="<?php echo e(json_encode([
            'status' => true,
            'text' => trans('general.add_new'),
            'path' => isset($attributes['path']) ? $attributes['path']: false,
            'type' => isset($attributes['type']) ? $attributes['type'] : 'modal',
            'field' => [
                'key' => isset($attributes['field']['key']) ? $attributes['field']['key'] : 'id',
                'value' => isset($attributes['field']['value']) ? $attributes['field']['value'] : 'name'
            ],
            'new_text' => trans('modules.new'),
            'buttons' => [
                'cancel' => [
                    'text' => trans('general.cancel'),
                    'class' => 'btn-outline-secondary'
                ],
                'confirm' => [
                    'text' => trans('general.save'),
                    'class' => 'btn-success'
                ]
            ]
        ])); ?>"

        <?php if(!empty($attributes['v-model'])): ?>
        @interface="form.errors.clear('<?php echo e($attributes['v-model']); ?>'); <?php echo e($attributes['v-model'] . ' = $event'); ?>"
        <?php elseif(!empty($attributes['data-field'])): ?>
        @interface="form.errors.clear('<?php echo e('form.' . $attributes['data-field'] . '.' . $name); ?>'); <?php echo e('form.' . $attributes['data-field'] . '.' . $name . ' = $event'); ?>"
        <?php else: ?>
        @interface="form.<?php echo e($name); ?> = $event; form.errors.clear('<?php echo e($name); ?>');"
        <?php endif; ?>

        <?php if(!empty($attributes['change'])): ?>
        @change="<?php echo e($attributes['change']); ?>($event)"
        <?php endif; ?>

        <?php if(!empty($attributes['visible-change'])): ?>
        @visible-change="<?php echo e($attributes['visible-change']); ?>"
        <?php endif; ?>

        <?php if(isset($attributes['readonly'])): ?>
        :readonly="<?php echo e($attributes['readonly']); ?>"
        <?php endif; ?>

        <?php if(isset($attributes['disabled'])): ?>
        :disabled="<?php echo e($attributes['disabled']); ?>"
        <?php endif; ?>

        <?php if(isset($attributes['show'])): ?>
        v-if="<?php echo e($attributes['show']); ?>"
        <?php endif; ?>

        <?php if(isset($attributes['v-error-message'])): ?>
        :form-error="<?php echo e($attributes['v-error-message']); ?>"
        <?php else: ?>
        :form-error="form.errors.get('<?php echo e($name); ?>')"
        <?php endif; ?>

        no-data-text="<?php echo e(trans('general.no_data')); ?>"
        no-matching-data-text="<?php echo e(trans('general.no_matching_data')); ?>"
    ></akaunting-select>

<?php echo $__env->yieldPushContent($name . '_input_end'); ?>
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/partials/form/select_add_new_group.blade.php ENDPATH**/ ?>