<?php $__env->startSection('title', setting('invoice.title', trans_choice('general.invoices', 1)) . ': ' . $invoice->document_number); ?>

<?php $__env->startSection('new_button'); ?>
    <?php echo $__env->yieldPushContent('button_print_start'); ?>
    <a href="<?php echo e($print_action); ?>" target="_blank" class="btn btn-white btn-sm">
        <?php echo e(trans('general.print')); ?>

    </a>
    <?php echo $__env->yieldPushContent('button_print_end'); ?>

    <?php echo $__env->yieldPushContent('button_pdf_start'); ?>
    <a href="<?php echo e($pdf_action); ?>" class="btn btn-white btn-sm">
        <?php echo e(trans('general.download')); ?>

    </a>
    <?php echo $__env->yieldPushContent('button_pdf_end'); ?>

    <?php echo $__env->yieldPushContent('button_dashboard_start'); ?>
    <?php if(!user()): ?>
        <a href="<?php echo e(route('portal.dashboard')); ?>" class="btn btn-white btn-sm">
            <?php echo e(trans('invoices.all_invoices')); ?>

        </a>
    <?php endif; ?>
    <?php echo $__env->yieldPushContent('button_dashboard_end'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal423fee4a6910172f4a7c907ec7d3b91058a5d428 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Documents\Show\Header::class, ['type' => 'invoice','document' => $invoice,'hideHeaderContact' => true,'classHeaderStatus' => 'col-md-8']); ?>
<?php $component->withName('documents.show.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal423fee4a6910172f4a7c907ec7d3b91058a5d428)): ?>
<?php $component = $__componentOriginal423fee4a6910172f4a7c907ec7d3b91058a5d428; ?>
<?php unset($__componentOriginal423fee4a6910172f4a7c907ec7d3b91058a5d428); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

    <?php if(!empty($payment_methods) && !in_array($invoice->status, ['paid', 'cancelled'])): ?>
    <div class="row">
        <div class="col-md-12">
            <?php echo Form::open([
                'id' => 'invoice-payment',
                'role' => 'form',
                'autocomplete' => "off",
                'novalidate' => 'true',
                'class' => 'mb-0'
            ]); ?>

                <?php echo e(Form::selectGroup('payment_method', '', 'money el-icon-money', $payment_methods, array_key_first($payment_methods), ['change' => 'onChangePaymentMethodSigned', 'id' => 'payment-method', 'class' => 'form-control d-none', 'placeholder' => trans('general.form.select.field', ['field' => trans_choice('general.payment_methods', 1)])], 'col-sm-12 d-none')); ?>

                <?php echo Form::hidden('document_id', $invoice->id, ['v-model' => 'form.document_id']); ?>

            <?php echo Form::close(); ?>


            <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-payment-method" role="tablist">
                    <?php $is_active = true; ?>

                    <?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->yieldPushContent('invoice_<?php echo e($key); ?>_tab_start'); ?>
                        <li class="nav-item">
                            <a @click="onChangePaymentMethodSigned('<?php echo e($key); ?>')" class="nav-link mb-sm-3 mb-md-0<?php echo e(($is_active) ? ' active': ''); ?>" id="tabs-payment-method-<?php echo e($key); ?>-tab" data-toggle="tab" href="#tabs-payment-method-<?php echo e($key); ?>" role="tab" aria-controls="tabs-payment-method-<?php echo e($key); ?>" aria-selected="true">
                                <?php echo e($name); ?>

                            </a>
                        </li>
                        <?php echo $__env->yieldPushContent('invoice_<?php echo e($key); ?>_tab_end'); ?>

                        <?php $is_active = false; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <div class="card shadow">
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <?php $is_active = true; ?>

                        <?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->yieldPushContent('invoice_<?php echo e($key); ?>_content_start'); ?>
                            <div class="tab-pane fade<?php echo e(($is_active) ? ' show active': ''); ?>" id="tabs-payment-method-<?php echo e($key); ?>" role="tabpanel" aria-labelledby="tabs-payment-method-<?php echo e($key); ?>-tab">
                                <component v-bind:is="method_show_html" @interface="onRedirectConfirm"></component>
                            </div>
                            <?php echo $__env->yieldPushContent('invoice_<?php echo e($key); ?>_content_end'); ?>

                            <?php $is_active = false; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if (isset($component)) { $__componentOriginala4c1f4156bcbe130e9461957dbdd42d7de2562f0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Documents\Show\Document::class, ['type' => 'invoice','document' => $invoice,'documentTemplate' => ''.e(setting('invoice.template', 'default')).'']); ?>
<?php $component->withName('documents.show.document'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginala4c1f4156bcbe130e9461957dbdd42d7de2562f0)): ?>
<?php $component = $__componentOriginala4c1f4156bcbe130e9461957dbdd42d7de2562f0; ?>
<?php unset($__componentOriginala4c1f4156bcbe130e9461957dbdd42d7de2562f0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer_start'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/css/print.css?v=' . version('short'))); ?>" type="text/css">
    <script src="<?php echo e(asset('public/js/portal/invoices.js?v=' . version('short'))); ?>"></script>

    <script type="text/javascript">
        var payment_action_path = <?php echo json_encode($payment_actions); ?>;
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.signed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/portal/invoices/signed.blade.php ENDPATH**/ ?>