<div>
    <div>
        <?php if(!empty($setting['name'])): ?>
            <h2><?php echo e($setting['name']); ?></h2>
        <?php endif; ?>

        <?php if(!empty($setting['description'])): ?>
            <div class="well well-sm"><?php echo e($setting['description']); ?></div>
        <?php endif; ?>
    </div>
    <br>

    <div class="buttons">
        <div class="pull-right">
            <?php echo Form::open([
                'url' => $confirm_url,
                'id' => 'redirect-form',
                'role' => 'form',
                'autocomplete' => "off",
                'novalidate' => 'true'
            ]); ?>

                <button @click="onRedirectConfirm" type="button" id="button-confirm" class="btn btn-success">
                    <?php echo e(trans('general.confirm')); ?>

                </button>
                <?php echo Form::hidden('payment_method', $setting['code']); ?>

                <?php echo Form::hidden('type', 'income'); ?>


            <?php echo Form::close(); ?>

        </div>
    </div>
</div>
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/modules/OfflinePayments/Providers/../Resources/views/show.blade.php ENDPATH**/ ?>