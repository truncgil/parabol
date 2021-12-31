<?php $__env->startSection('title', trans_choice('general.companies', 1)); ?>

<?php $__env->startSection('content'); ?>
    <?php echo Form::open([
        'id' => 'setting',
        'method' => 'PATCH',
        'route' => 'settings.update',
        '@submit.prevent' => 'onSubmit',
        '@keydown' => 'form.errors.clear($event.target.name)',
        'files' => true,
        'role' => 'form',
        'class' => 'form-loading-button',
        'novalidate' => true
    ]); ?>


    <div class="card">
        <div class="card-body">
            <div class="row">
                <?php echo e(Form::textGroup('name', trans('settings.company.name'), 'building', ['required' => 'required'], setting('company.name'))); ?>


                <?php echo e(Form::textGroup('email', trans('settings.company.email'), 'envelope', ['required' => 'required'], setting('company.email'))); ?>


                <?php echo e(Form::textGroup('tax_number', trans('general.tax_number'), 'percent', [], setting('company.tax_number'))); ?>


                <?php echo e(Form::textGroup('phone', trans('settings.company.phone'), 'phone', [], setting('company.phone'))); ?>


                <?php echo e(Form::textareaGroup('address', trans('settings.company.address'), null, setting('company.address'))); ?>


               
                <?php echo e(Form::textGroup('efatura_user', 'E-Fatura Kullanıcı Adı', 'user', [], setting('company.efatura_user'))); ?>

                <?php echo e(Form::textGroup('efatura_pass', 'E-Fatura Şifre', 'key', [], setting('company.efatura_pass'))); ?>

               <?php echo e(Form::fileGroup('logo', trans('settings.company.logo'), 'file-image-o', [], setting('company.logo'))); ?>

            
            </div>
        </div>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-settings-settings')): ?>
            <div class="card-footer">
                <div class="row save-buttons">
                    <?php echo e(Form::saveButtons('settings.index')); ?>

                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php echo Form::hidden('_prefix', 'company'); ?>


    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <script src="<?php echo e(asset('public/js/settings/settings.js?v=' . version('short'))); ?>"></script>
    <script>

// or disable for specific dropzone:
// Dropzone.options.myDropzone = false;

$(function() {
  // Now that the DOM is fully loaded, create the dropzone, and setup the
  // event listeners

  $("#dropzone-30").on("addedfile", function(file) {
      console.log("ok");
    /* Maybe display some more file information on your page */
  });
})
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/settings/company/edit.blade.php ENDPATH**/ ?>