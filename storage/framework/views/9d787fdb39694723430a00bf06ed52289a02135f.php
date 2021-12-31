<?php echo $__env->yieldPushContent('scripts_start'); ?>
    <!-- Core -->
    <script src="<?php echo e(asset('public/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/vendor/js-cookie/js.cookie.js')); ?>"></script>
 <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-DX0Y59RNCN"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-DX0Y59RNCN');
</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6048101661713069"
     crossorigin="anonymous"></script>
    <?php echo $__env->yieldPushContent('body_css'); ?>

    <?php echo $__env->yieldPushContent('body_stylesheet'); ?>

    <?php echo $__env->yieldPushContent('body_js'); ?>

    <?php echo $__env->yieldPushContent('body_scripts'); ?>

    <?php echo \Livewire\Livewire::scripts(); ?>

<?php echo $__env->yieldPushContent('scripts_end'); ?>
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/partials/auth/scripts.blade.php ENDPATH**/ ?>