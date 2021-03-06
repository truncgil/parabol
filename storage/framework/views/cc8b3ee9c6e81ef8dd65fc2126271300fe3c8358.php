<head>
    <?php echo $__env->yieldPushContent('head_start'); ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <base href="<?php echo e(config('app.url') . '/'); ?>">
    <?php echo $__env->make('partials.pwa.pwa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('public/vendor/jquery/dist/jquery.min.js')); ?>"></script>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo e(asset('public/img/favicon.ico')); ?>" type="image/png">

    <!-- Font -->
    <link rel="stylesheet" href="<?php echo e(asset('public/vendor/opensans/css/opensans.css?v=' . version('short'))); ?>" type="text/css">

    <!-- Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('public/vendor/nucleo/css/nucleo.css?v=' . version('short'))); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('public/vendor/fontawesome/css/all.min.css?v=' . version('short'))); ?>" type="text/css">

    <!-- Css 
    <link rel="stylesheet" href="<?php echo e(asset('public/css/argon.css?v=' . version('short'))); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('public/css/akaunting-color.css?v=' . version('short'))); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('public/css/custom.css?v=' . version('short'))); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('public/css/element.css?v=' . version('short'))); ?>" type="text/css">
    -->
    <link rel="stylesheet" href="<?php echo e(asset('public/css/parabol.css?v=' . version('short'))); ?>" type="text/css">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6048101661713069"
     crossorigin="anonymous"></script>
     

    <?php echo $__env->yieldPushContent('css'); ?>

    <?php echo $__env->yieldPushContent('stylesheet'); ?>

    <?php echo \Livewire\Livewire::styles(); ?>


    <script type="text/javascript"><!--
        var url = '<?php echo e(url("/" . company_id())); ?>';
        var app_url = '<?php echo e(config("app.url")); ?>';
        var aka_currency = <?php echo !empty($currency) ? $currency : 'false'; ?>;
    //--></script>

    <?php echo $__env->yieldPushContent('js'); ?>

    <script type="text/javascript"><!--
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;

        var flash_notification = <?php echo (session()->has('flash_notification')) ? json_encode(session()->get('flash_notification')) : 'false'; ?>;
    //--></script>

    <?php echo e(session()->forget('flash_notification')); ?>


    <?php echo $__env->yieldPushContent('scripts'); ?>

    <?php echo $__env->yieldPushContent('head_end'); ?>
</head>
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/partials/auth/head.blade.php ENDPATH**/ ?>