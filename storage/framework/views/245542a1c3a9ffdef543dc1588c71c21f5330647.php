<?php echo $__env->yieldPushContent('menu_start'); ?>
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-default" id="sidenav-main">
        <div class="scrollbar-inner">
            <div class="sidenav-header d-flex align-items-center">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="avatar menu-avatar background-unset">
                                <img class="border-radius-none border-0 mr-3" alt="Truncgil Parabol" src="<?php echo e(asset('public/img/icon-dark.svg')); ?>">
                            </span>
                            <span class="nav-link-text long-texts pl-2 mwpx-100"><?php echo e(Str::limit(setting('company.name'), 22)); ?></span>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read-common-companies')): ?>
                                <i class="fas fa-sort-down pl-2"></i>
                            <?php endif; ?>
                        </a>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read-common-companies')): ?>
                            <div class="dropdown-menu dropdown-menu-right menu-dropdown menu-dropdown-width">
                                <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $com): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('companies.switch', $com->id)); ?>" class="dropdown-item">
                                        <i class="fas fa-building"></i>
                                        <span><?php echo e(Str::limit($com->name, 18)); ?></span>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-common-companies')): ?>
                                    <div class="dropdown-divider"></div>
                                    <a href="<?php echo e(route('companies.index')); ?>" class="dropdown-item">
                                        <i class="fas fa-cogs"></i>
                                        <span><?php echo e(trans('general.title.manage', ['type' => trans_choice('general.companies', 2)])); ?></span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </li>
                    
                </ul>
                <div class="ml-auto left-menu-toggle-position overflow-hidden">
                    <div class="sidenav-toggler d-none d-xl-block left-menu-toggle" data-action="sidenav-unpin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </div>
                
            </div>
            <?php echo menu('admin'); ?> 
            <div class="sidenav-header  align-items-center">
                <ul class="navbar-nav">
                    
                    <li class="nav-item"> <a class="nav-link waves-effect"
                            href="<?php echo e(company_id()); ?>/ext/sms-paketi-al"><i class="fa fa-envelope"></i> <span
                                class="nav-link-text">SMS Durumu</span> </a></li>
                    <li class="nav-item"> <a class="nav-link waves-effect"
                            href="<?php echo e(company_id()); ?>/ext/odeme-yapin"><i class="fa fa-credit-card"></i> <span
                                class="nav-link-text">Destek Olun</span> </a></li>
                    <li class="nav-item"> <a class="nav-link waves-effect"
                            href="<?php echo e(company_id()); ?>/ext/destek-merkezi"><i class="fa fa-life-ring"></i> <span
                                class="nav-link-text">Destek Merkezi</span> </a></li>
                    <li class="nav-item show-mobile"> <a class="nav-link waves-effect"
                            href="<?php echo e(company_id()); ?>/ext/parabol-masaustu"><i class="fa fa-desktop"></i> <span
                                class="nav-link-text">Parabol Masaüstü</span> </a></li>
                    <li class="nav-item"> <a class="nav-link waves-effect"
                            href="<?php echo e(company_id()); ?>/ext/duyurular"><i class="fa fa-bullhorn"></i> <span
                                class="nav-link-text">Duyurular ve Geliştirmeler</span> </a></li>
                                <?php if(company_id()==1)  { 
                                  ?>
                     <li class="nav-item"> <a class="nav-link waves-effect"
                             href="<?php echo e(company_id()); ?>/ext/gelen-odemeler"><i class="fa fa-credit-card"></i> <span
                                 class="nav-link-text">Gelen Ödemeler</span> </a></li> 
                                 <?php } ?>
                </ul>
            </div>
         
        </div>
    </nav>
<?php echo $__env->yieldPushContent('menu_end'); ?>
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/partials/admin/menu.blade.php ENDPATH**/ ?>