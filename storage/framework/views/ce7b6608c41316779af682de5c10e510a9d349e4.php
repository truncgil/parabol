<?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $type = $field['type']; ?>

    <?php if(($type == 'textGroup') || ($type == 'emailGroup') || ($type == 'passwordGroup')): ?>
        <?php echo e(Form::$type($field['name'], $field['title'], $field['icon'], array_merge([
                'data-field' => 'settings'
            ],
            $field['attributes'])
        )); ?>

    <?php elseif($type == 'textareaGroup'): ?>
        <?php echo e(Form::$type($field['name'], $field['title'])); ?>

    <?php elseif($type == 'dateGroup'): ?>
        <?php echo e(Form::$type($field['name'], $field['title'], $field['icon'], array_merge([
               'model' => 'form.settings'.'.'.$field['name'],
               'show-date-format' => company_date_format(),
           ],
           $field['attributes'])
       )); ?>

    <?php elseif($type == 'selectGroup'): ?>
        <?php echo e(Form::$type($field['name'], $field['title'], $field['icon'], $field['values'], $field['selected'], array_merge([
                'data-field' => 'settings'
            ],
            $field['attributes'])
        )); ?>

    <?php elseif($type == 'radioGroup'): ?>
        <?php echo e(Form::$type($field['name'], $field['title'], $field['selected'] ?? true, $field['enable'], $field['disable'], array_merge([
                'data-field' => 'settings'
            ],
            $field['attributes'])
        )); ?>

    <?php elseif($type == 'checkboxGroup'): ?>
        <?php echo e(Form::$type($field['name'], $field['title'], $field['items'], $field['value'], $field['id'], $field['selected'], array_merge([
                'data-field' => 'settings'
            ],
            $field['attributes'])
        )); ?>

    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/partials/reports/fields.blade.php ENDPATH**/ ?>