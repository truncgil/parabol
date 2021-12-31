<?php $__env->startSection('title', trans_choice('general.transfers', 1)); ?>

<?php $__env->startSection('new_button'); ?>
    <?php if (isset($component)) { $__componentOriginal752341ddb58f6f9e88ec1a6630fb29460c5ab030 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Transfers\Show\TopButtons::class, ['transfer' => $transfer]); ?>
<?php $component->withName('transfers.show.top-buttons'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal752341ddb58f6f9e88ec1a6630fb29460c5ab030)): ?>
<?php $component = $__componentOriginal752341ddb58f6f9e88ec1a6630fb29460c5ab030; ?>
<?php unset($__componentOriginal752341ddb58f6f9e88ec1a6630fb29460c5ab030); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal846f54b03783052e094f568a705e644af2f90deb = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Transfers\Show\Content::class, ['transfer' => $transfer]); ?>
<?php $component->withName('transfers.show.content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal846f54b03783052e094f568a705e644af2f90deb)): ?>
<?php $component = $__componentOriginal846f54b03783052e094f568a705e644af2f90deb; ?>
<?php unset($__componentOriginal846f54b03783052e094f568a705e644af2f90deb); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('content_content_end'); ?>
    <akaunting-modal
        :show="template.modal"
        @cancel="template.modal = false"
        :title="'<?php echo e(trans('settings.transfer.choose_template')); ?>'"
        :message="template.html"
        :button_cancel="'<?php echo e(trans('general.button.save')); ?>'"
        :button_delete="'<?php echo e(trans('general.button.cancel')); ?>'">
        <template #modal-body>
            <?php echo $__env->make('modals.settings.transfer_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    <link rel="stylesheet" href="<?php echo e(asset('public/css/print.css?v=' . version('short'))); ?>" type="text/css">

    <?php if (isset($component)) { $__componentOriginalf80e4bee7a3ca29641a5c24fbe3f4bad2ee22637 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Transfers\Script::class, []); ?>
<?php $component->withName('transfers.script'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalf80e4bee7a3ca29641a5c24fbe3f4bad2ee22637)): ?>
<?php $component = $__componentOriginalf80e4bee7a3ca29641a5c24fbe3f4bad2ee22637; ?>
<?php unset($__componentOriginalf80e4bee7a3ca29641a5c24fbe3f4bad2ee22637); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/banking/transfers/show.blade.php ENDPATH**/ ?>