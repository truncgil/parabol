<?php echo Form::open([
    'id' => 'form-create-tax',
    '@submit.prevent' => 'onSubmit',
    '@keydown' => 'form.errors.clear($event.target.name)',
    'role' => 'form',
    'class' => 'form-loading-button',
    'route' => 'taxes.store',
    'novalidate' => true
]); ?>

    <div class="row">
        <?php echo e(Form::textGroup('name', trans('general.name'), 'font')); ?>


        <?php echo e(Form::textGroup('rate', trans('taxes.rate'), 'percent')); ?>


        <?php echo Form::hidden('type', 'normal'); ?>

        <?php echo Form::hidden('enabled', '1'); ?>

    </div>
<?php echo Form::close(); ?>

<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/modals/taxes/create.blade.php ENDPATH**/ ?>