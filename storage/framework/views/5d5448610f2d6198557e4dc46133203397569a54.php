<html lang="<?php echo e(app()->getLocale()); ?>" class="">

    <?php echo $__env->make('partials.admin.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
     function onload() {
        $(".preloader").addClass("d-none");
    }
    </script>

    <?php if (app('mobile-detect')->isMobile() && !app('mobile-detect')->isTablet()) : ?>
        <body id="leftMenu" onload="onload()" class="g-sidenav-hidden">	
    <?php else: ?>
        <body id="leftMenu" onload="onload()" class="g-sidenav-show">	
    <?php endif; ?>

        <?php echo $__env->yieldPushContent('body_start'); ?>

        <?php echo $__env->make('partials.admin.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="main-content" id="panel">

            <?php echo $__env->make('partials.admin.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div id="main-body">

                <?php echo $__env->make('partials.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="container-fluid content-layout mt--6">

                    <?php echo $__env->make('partials.admin.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make('partials.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>

            </div>

        </div>

        <?php echo $__env->yieldPushContent('body_end'); ?>

        <?php echo $__env->make('partials.admin.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>

</html>
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/layouts/admin.blade.php ENDPATH**/ ?>