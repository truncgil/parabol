<?php $__env->startSection('title', trans_choice('general.invoices', 1)); ?>

<?php $__env->startSection('content'); ?>
    <?php echo Form::open([
        'id' => 'setting',
        'method' => 'PATCH',
        'route' => 'settings.update',
        '@submit.prevent' => 'onSubmit',
        '@keydown' => 'form.errors.clear($event.target.name)',
        'files' => true,
        'role' => 'form',
        'class' => 'form-loading-button',
        'novalidate' => true,
    ]); ?>


        <div class="card">
            <div class="card-body">
                <div class="row">
                    <?php echo e(Form::textGroup('number_prefix', trans('settings.invoice.prefix'), 'font', [], setting('invoice.number_prefix'))); ?>


                    <?php echo e(Form::textGroup('number_digit', trans('settings.invoice.digit'), 'text-width', [], setting('invoice.number_digit'))); ?>


                    <?php echo e(Form::textGroup('number_next', trans('settings.invoice.next'), 'chevron-right', [], setting('invoice.number_next'))); ?>


                    <?php echo e(Form::selectGroup('payment_terms', trans('settings.invoice.payment_terms'), 'calendar', $payment_terms, setting('invoice.payment_terms'), [])); ?>


                    <?php echo e(Form::textGroup('title', trans('settings.invoice.title'), 'font', [], setting('invoice.title'))); ?>


                    <?php echo e(Form::textGroup('subheading', trans('settings.invoice.subheading'), 'font', [], setting('invoice.subheading'))); ?>


                    <?php echo e(Form::textareaGroup('notes', trans_choice('general.notes', 2), 'sticky-note-o', setting('invoice.notes'), ['rows' => 3], 'col-md-6')); ?>


                    <?php echo e(Form::textareaGroup('footer', trans('general.footer'), 'sticky-note-o', setting('invoice.footer'), ['rows' => 3], 'col-md-6')); ?>


                    <?php echo e(Form::invoice_text('item_name', trans('settings.invoice.item_name'), 'font', $item_names, setting('invoice.item_name'), [], 'item_name_input', setting('invoice.item_name_input'))); ?>


                    <?php echo e(Form::radioGroup('hide_item_name', trans('settings.invoice.hide.item_name'), setting('invoice.hide_item_name'))); ?>


                    <?php echo e(Form::invoice_text('price_name', trans('settings.invoice.price_name'), 'font', $price_names, setting('invoice.price_name'), [], 'price_name_input', setting('invoice.price_name_input'))); ?>


                    <?php echo e(Form::radioGroup('hide_price', trans('settings.invoice.hide.price'), setting('invoice.hide_price'))); ?>


                    <?php echo e(Form::invoice_text('quantity_name', trans('settings.invoice.quantity_name'), 'font', $quantity_names, setting('invoice.quantity_name'), [], 'quantity_name_input', setting('invoice.quantity_name_input'))); ?>


                    <?php echo e(Form::radioGroup('hide_quantity', trans('settings.invoice.hide.quantity'), setting('invoice.hide_quantity'))); ?>


                    <?php echo e(Form::radioGroup('hide_item_description', trans('settings.invoice.hide.item_description'), setting('invoice.hide_item_description'))); ?>


                    <?php echo e(Form::radioGroup('hide_amount', trans('settings.invoice.hide.amount'), setting('invoice.hide_amount'))); ?>


                    <div class="form-group col-md-6">
                        <?php echo Form::label('invoice_template', trans_choice('general.templates', 1), ['class' => 'form-control-label']); ?>


                        <div class="input-group">
                            <button type="button" class="btn btn-block btn-outline-primary" @click="onTemplate">
                                <?php echo e(trans('settings.invoice.choose_template')); ?>

                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-settings-settings')): ?>
                <div class="card-footer">
                    <div class="row save-buttons">
                        <?php echo e(Form::saveButtons('settings.index')); ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>

        <?php echo Form::hidden('_prefix', 'invoice'); ?>


    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('content_content_end'); ?>
    <akaunting-modal
        :show="template.modal"
        @cancel="template.modal = false"
        :title="'<?php echo e(trans('settings.invoice.choose_template')); ?>'"
        :message="template.html"
        :button_cancel="'<?php echo e(trans('general.button.save')); ?>'"
        :button_delete="'<?php echo e(trans('general.button.cancel')); ?>'">
        <template #modal-body>
            <?php echo $__env->make('modals.settings.invoice_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </template>

        <template #card-footer>
            <div class="float-right">
                <button type="button" class="btn btn-outline-secondary" @click="closeTemplate">
                    <?php echo e(trans('general.cancel')); ?>

                </button>

                <button :disabled="form.loading"  type="button" class="btn btn-success button-submit" @click="addTemplate">
                    <span v-if="form.loading" class="btn-inner--icon"><i class="aka-loader"></i></span>
                    <span :class="[{'ml-0': form.loading}]" class="btn-inner--text"><?php echo e(trans('general.confirm')); ?></span>
                </button>
            </div>
        </template>
    </akaunting-modal>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <script src="<?php echo e(asset('public/js/settings/settings.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/settings/invoice/edit.blade.php ENDPATH**/ ?>