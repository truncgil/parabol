<html lang="<?php echo e(app()->getLocale()); ?>">
    <?php echo $__env->make('partials.signed.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <body>
        <?php echo $__env->yieldPushContent('body_start'); ?>

        <div class="container-fluid content-layout mt-4">

            <?php echo $__env->make('partials.signed.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('partials.signed.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>

        <?php echo $__env->yieldPushContent('body_end'); ?>
    </body>

</html>
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/layouts/signed.blade.php ENDPATH**/ ?>