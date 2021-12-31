<div class="modal-body pb-0">
    <?php echo Form::open([
            'route' => 'modals.transfer-templates.update',
            'method' => 'PATCH',
            'id' => 'template',
            '@submit.prevent' => 'onSubmit',
            '@keydown' => 'transfer_form.errors.clear($event.target.name)',
            'files' => true,
            'role' => 'form',
            'class' => 'form-loading-button mb-0',
            'novalidate' => true
    ]); ?>

        <div class="row mb-4">
            <div class="col-md-4 text-center">
                <div class="bg-print border-radius-default print-edge choose" @click="transfer_form.template='default'">
                    <img src="<?php echo e(asset('public/img/transfer_templates/default.png')); ?>" class="mb-1 mt-3" height="200" alt="Default"/>
                    </br>
                    <label style="font-size: initial;">
                        <input type="radio" name="template" value="default" v-model="transfer_form.template">
                        <?php echo e(trans('settings.invoice.default')); ?>

                    </label>
                </div>
            </div>

            <div class="col-md-4 text-center px-2">
                <div class="bg-print border-radius-default print-edge choose" @click="transfer_form.template='second'">
                    <img src="<?php echo e(asset('public/img/transfer_templates/second.png')); ?>" class="mb-1 mt-3" height="200" alt="Second"/>
                    </br>
                    <label style="font-size: initial;">
                        <input type="radio" name="template" value="second" v-model="transfer_form.template">
                        <?php echo e(trans('settings.transfer.second')); ?>

                    </label>
                </div>
            </div>

            <div class="col-md-4 text-center px-0">
                <div class="bg-print border-radius-default print-edge choose" @click="transfer_form.template='third'">
                    <img src="<?php echo e(asset('public/img/transfer_templates/third.png')); ?>" class="mb-1 mt-3" height="200" alt="Third"/>
                    </br>
                    <label style="font-size: initial;">
                        <input type="radio" name="template" value="third" v-model="transfer_form.template">
                        <?php echo e(trans('settings.transfer.third')); ?>

                    </label>
                </div>
            </div>
        </div>

        <?php echo Form::hidden('transfer_id', $transfer->id); ?>

        <?php echo Form::hidden('_template', setting('transfer.template')); ?>

        <?php echo Form::hidden('_prefix', 'transfer'); ?>

    <?php echo Form::close(); ?>

</div>
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/modals/settings/transfer_template.blade.php ENDPATH**/ ?>