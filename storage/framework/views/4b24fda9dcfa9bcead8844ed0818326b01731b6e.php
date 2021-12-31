<?php $__env->startSection('title', trans('revenues.revenue_received')); ?>

<?php $__env->startSection('new_button'); ?>
    <?php if (isset($component)) { $__componentOriginalcb0b964f0e079037e8bdb200dbb5f21ab45479f0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Transactions\Show\TopButtons::class, ['type' => 'income','transaction' => $revenue]); ?>
<?php $component->withName('transactions.show.top-buttons'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalcb0b964f0e079037e8bdb200dbb5f21ab45479f0)): ?>
<?php $component = $__componentOriginalcb0b964f0e079037e8bdb200dbb5f21ab45479f0; ?>
<?php unset($__componentOriginalcb0b964f0e079037e8bdb200dbb5f21ab45479f0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal3c6173c21e5d63823dbbf6ae0fed35e5288e1ef4 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Transactions\Show\Content::class, ['type' => 'income','transaction' => $revenue]); ?>
<?php $component->withName('transactions.show.content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal3c6173c21e5d63823dbbf6ae0fed35e5288e1ef4)): ?>
<?php $component = $__componentOriginal3c6173c21e5d63823dbbf6ae0fed35e5288e1ef4; ?>
<?php unset($__componentOriginal3c6173c21e5d63823dbbf6ae0fed35e5288e1ef4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/css/print.css?v=' . version('short'))); ?>" type="text/css">

    <?php if (isset($component)) { $__componentOriginale8b69a6b05b810c421673362e9ba96122aef97fd = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Transactions\Script::class, ['type' => 'income']); ?>
<?php $component->withName('transactions.script'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginale8b69a6b05b810c421673362e9ba96122aef97fd)): ?>
<?php $component = $__componentOriginale8b69a6b05b810c421673362e9ba96122aef97fd; ?>
<?php unset($__componentOriginale8b69a6b05b810c421673362e9ba96122aef97fd); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <script>
        $(function(){
            $(".action-delete").on("click",function(){
                
                $.ajax({
                    method : "DELETE",
                    data : {
                        _token : "<?php echo e(csrf_token()); ?>"
                    },
                    url : "<?php echo $_SERVER['SCRIPT_URI'] ?>",
                    success:function(d){
                       location.href = d.redirect;
                    }

                });
                
               
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/sales/revenues/show.blade.php ENDPATH**/ ?>