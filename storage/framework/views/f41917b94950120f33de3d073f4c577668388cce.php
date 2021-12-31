<?php echo $__env->yieldPushContent('footer_start'); ?>

    <footer class="footer">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="text-sm float-left text-muted footer-texts">
                    <?php echo e(trans('footer.powered')); ?>: <a href="<?php echo e(trans('footer.link')); ?>" target="_blank" class="text-muted"><?php echo e(trans('footer.software')); ?></a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="text-sm float-right text-muted footer-texts">
                    <?php echo e(trans('footer.version')); ?> <?php echo e(version('short')); ?>

                </div>
            </div>
        </div>
    </footer>
    <footer class="mobile-footer">
        <div class="container">
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                    <a class="nav-link waves active" href="./">
                        <span>
                            <i class="nav-icon fa fa-tachometer-alt"></i>
                            <span class="nav-text">Özet</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves" href="<?php echo e(route('items.index')); ?>">
                        <span>
                            <i class="nav-icon fa fa-cube"></i>
                            <span class="nav-text">Ürün</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item centerbutton">
                    <div class="nav-link" onclick="$(this).toggleClass('active');">
                        <span class="theme-radial-gradient">
                            <i class="close fa fa-plus"></i>
                            <img src="public/img/icon.svg" class="nav-icon" alt="">
                        </span>
                        <div class="nav-menu-popover justify-content-between">
                            <button type="button" class="btn btn-lg btn-icon-text" onclick="window.location.replace('<?php echo e(route('invoices.create')); ?>');">
                                <i class="fa fa-money-bill size-32"></i><span>Fatura Kes</span>
                            </button>

                            <button type="button" class="btn btn-lg btn-icon-text" onclick="window.location.replace('<?php echo e(route('revenues.create')); ?>');">
                                <i class="fas fa-hand-holding-usd size-32"></i><span>Tahsilat</span>
                            </button>

                            <button type="button" class="btn btn-lg btn-icon-text" onclick="window.location.replace('<?php echo e(route('customers.create')); ?>');">
                                <i class="fas fa-user size-32"></i><span>Yeni Müşteri</span>
                            </button>

                            <button type="button" class="btn btn-lg btn-icon-text" onclick="window.location.replace('<?php echo e(route('bills.create')); ?>');">
                                <i class="fa fa-shopping-cart size-32"></i><span>Alış Faturası</span>
                            </button>
                            <button type="button" class="btn btn-lg btn-icon-text" onclick="window.location.replace('<?php echo e(route('payments.create')); ?>');">
                                <i class="fas fa-hand-holding-usd size-32"></i><span>Ödeme</span>
                            </button>

                            <button type="button" class="btn btn-lg btn-icon-text" onclick="window.location.replace('<?php echo e(route('vendors.create')); ?>');">
                                <i class="fas fa-user size-32"></i><span>Yeni Tedarikçi</span>
                            </button>

                          
                        </div>
                    </div>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link waves" href="<?php echo e(route("accounts.index")); ?>">
                        <span>
                            
                            <i class="nav-icon fa fa-briefcase"></i>
                            <span class="nav-text">Banka</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="$('body').toggleClass('g-sidenav-pinned');$('body').toggleClass('g-sidenav-show');$('body').toggleClass('g-sidenav-hidden');">
                        <span>
                            <i class="nav-icon fa fa-bars"></i>
                            <span class="nav-text">Menü</span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.6/waves.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.6/waves.min.css">
<script type="text/javascript">

    Waves.init();

    Waves.attach('.waves');
    Waves.attach(".btn-primary");
    Waves.attach(".btn-success");
    Waves.attach(".btn-warning");
    Waves.attach(".btn-danger");
    Waves.attach(".btn-info");
  
    Waves.attach('#sidenav-collapse-main .nav-link');

</script> 
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-DX0Y59RNCN"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-DX0Y59RNCN');
</script>
<?php echo $__env->yieldPushContent('footer_end'); ?>
<?php /**PATH E:\Works\xampp\htdocs\parabol\resources\views/partials/admin/footer.blade.php ENDPATH**/ ?>