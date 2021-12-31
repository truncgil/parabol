<?php echo $__env->yieldPushContent('content_start'); ?>
    <div id="app">
        <?php echo $__env->yieldPushContent('content_header_start'); ?>
            <div class="row">
                <div class="col-md-6">
                    <h1>
                        <?php echo $__env->yieldContent('title'); ?>
                    </h1>
                </div>
                <div class="col-md-6 text-right">
                    <?php echo $__env->yieldContent('new_button'); ?>
                </div>
            </div>
        <?php echo $__env->yieldPushContent('content_header_end'); ?>

        <?php echo $__env->yieldPushContent('content_content_start'); ?>

            <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->yieldPushContent('content_content_end'); ?>

        <notifications></notifications>

        <form id="form-dynamic-component" method="POST" action="#"></form>

        <component v-bind:is="component"></component>
    </div>
<?php echo $__env->yieldPushContent('content_end'); ?>
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/partials/signed/content.blade.php ENDPATH**/ ?>