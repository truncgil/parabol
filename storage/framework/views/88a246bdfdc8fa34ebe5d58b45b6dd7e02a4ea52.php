<?php $__env->startSection('title', trans('general.title.edit', ['type' => trans_choice('general.currencies', 1)])); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <?php echo Form::model($currency, [
            'id' => 'currency',
            'method' => 'PATCH',
            'route' => ['currencies.update', $currency->id],
            '@submit.prevent' => 'onSubmit',
            '@keydown' => 'form.errors.clear($event.target.name)',
            'files' => true,
            'role' => 'form',
            'class' => 'form-loading-button',
            'novalidate' => true
        ]); ?>


            <div class="card-body">
                <div class="row">
                    <?php echo e(Form::textGroup('name', trans('general.name'), 'chart-bar')); ?>


                    <?php echo e(Form::selectGroup('code', trans('currencies.code'), 'code', $codes, $currency->code, ['required' => 'required', 'change' => 'onChangeCode'])); ?>


                    <?php echo e(Form::textGroup('rate', trans('currencies.rate'), 'sliders-h', ['@input' => 'onChangeRate', 'required' => 'required'])); ?>


                    <?php echo e(Form::selectGroup('precision', trans('currencies.precision'), 'dot-circle', $precisions, $currency->precision, ['model' => 'form.precision'])); ?>


                    <?php echo e(Form::textGroup('symbol', trans('currencies.symbol.symbol'), 'font')); ?>


                    <?php echo e(Form::selectGroup('symbol_first', trans('currencies.symbol.position'), 'text-width', ['1' => trans('currencies.symbol.before'), '0' => trans('currencies.symbol.after')], $currency->symbol_first, ['model' => 'form.symbol_first'])); ?>


                    <?php echo e(Form::textGroup('decimal_mark', trans('currencies.decimal_mark'), 'sign')); ?>


                    <?php echo e(Form::textGroup('thousands_separator', trans('currencies.thousands_separator'), 'slash', [])); ?>


                    <?php echo e(Form::radioGroup('enabled', trans('general.enabled'), $currency->enabled)); ?>


                    <?php echo e(Form::radioGroup('default_currency', trans('currencies.default'), $currency->default_currency, '', '', ['disabled' => (setting('default.currency') == $currency->code) ? 'disabled': false])); ?>

                </div>
            </div>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-settings-currencies')): ?>
                <div class="card-footer">
                    <div class="row save-buttons">
                        <?php echo e(Form::saveButtons('currencies.index')); ?>

                    </div>
                </div>
             <?php endif; ?>

        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <script src="<?php echo e(asset('public/js/settings/currencies.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/settings/currencies/edit.blade.php ENDPATH**/ ?>