<?php $__env->startSection('title', trans('general.title.new', ['type' => trans_choice('general.transfers', 1)])); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <?php echo Form::open([
            'route' => 'transfers.store',
            'id' => 'transfer',
            '@submit.prevent' => 'onSubmit',
            '@keydown' => 'form.errors.clear($event.target.name)',
            'files' => true,
            'role' => 'form',
            'class' => 'form-loading-button',
            'novalidate' => true
        ]); ?>


            <div class="card-body">
                <div class="row">
                    <?php echo e(Form::selectGroup('from_account_id', trans('transfers.from_account'), 'university', $accounts, null, ['required' => 'required', 'change' => 'onChangeFromAccount'])); ?>


                    <?php echo e(Form::selectGroup('to_account_id', trans('transfers.to_account'), 'university', $accounts, null, ['required' => 'required', 'change' => 'onChangeToAccount'])); ?>


                    <div class="d-none w-100" :class="[{'d-flex' : show_rate}]">
                        <?php echo Form::hidden('from_currency_code', null, ['id' => 'from_currency_code', 'v-model' => 'form.from_currency_code']); ?>


                        <?php echo e(Form::textGroup('from_account_rate', trans('transfers.from_account_rate'), 'sliders-h', [':disabled' => "form.from_currency_code == '" . setting('default.currency') . "'"])); ?>


                        <?php echo Form::hidden('to_currency_code', null, ['id' => 'to_currency_code', 'v-model' => 'form.to_currency_code']); ?>


                        <?php echo e(Form::textGroup('to_account_rate', trans('transfers.to_account_rate'), 'sliders-h', [':disabled' => "form.to_currency_code == '" . setting('default.currency') . "'"])); ?>

                      
                        
                    </div>
                    <script>
                          function toNumber(money) {
                              money = money.replace("GRA","");
                                var currency = money; //it works for US-style currency strings as well
                                var cur_re = /\D*(\d+|\d.*?\d)(?:\D+(\d{2}))?\D*$/;
                            
                                currency = currency.toString().replace(",",".");
                              //  currency = parseFloat(currency);
                                
                              //  console.log("çeviriden sonra" + currency);
                               
                                var parts = cur_re.exec(currency);
                                var number = parseFloat(parts[1].replace(/\D/,'')+'.'+(parts[2]?parts[2]:'00'));
                                return number;
                            }   
                        $(function(){
                          
                            
                            var amount = $("[name='amount']");
                            amount.on("keyup",function(){
                                $(".gonderilecek").removeClass("d-none");
                                var to_account_rate = (eval($("#to_account_rate").val()));
                                var from_account_rate = (eval($("#from_account_rate").val()));
                                var to_currency_code = ($("#to_currency_code").val());
                                var deger = $(this).val();
                                console.log(deger);
                                deger = toNumber(deger);
                                var sonuc;
                               console.log(deger);
                               console.log(to_account_rate);
                               console.log(from_account_rate);
                                if(to_account_rate>from_account_rate) {
                                    sonuc = (deger) / (to_account_rate);
                                } else {
                                    sonuc = (deger) * (from_account_rate);
                                }
                                sonuc = sonuc.toFixed(2);
                               $(".gonderilecek").html("Gönderilecek Tutar: " + sonuc + " " + to_currency_code);
                            });
                              
                        });
                    </script>
                    <div class="d-none w-100" :class="[{'d-flex' : show_rate}]">
                        <div class="col-12"><div class="d-none gonderilecek btn btn-icon btn-success" style="    margin: 0 auto !important;
    display: block;
    width: 300px;"></div></div>
                    </div>

                    <?php echo e(Form::moneyGroup('amount', trans('general.amount'), 'money-bill-alt', ['required' => 'required', 'currency' => $currency, 'dynamic-currency' => 'currency'], 0)); ?>


                    <?php echo e(Form::dateGroup('transferred_at', trans('general.date'), 'calendar', ['id' => 'transferred_at', 'class' => 'form-control datepicker', 'required' => 'required', 'show-date-format' => company_date_format(), 'date-format' => 'Y-m-d H:i:s', 'autocomplete' => 'off'], simdi())); ?>


                    <?php echo e(Form::textareaGroup('description', trans('general.description'))); ?>


                    <?php echo e(Form::selectGroup('payment_method', trans_choice('general.payment_methods', 1), 'credit-card', $payment_methods, setting('default.payment_method'))); ?>


                    <?php echo e(Form::textGroup('reference', trans('general.reference'), 'file', [])); ?>


                    <?php echo e(Form::fileGroup('attachment', trans('general.attachment'), '', ['dropzone-class' => 'w-100', 'multiple' => 'multiple', 'options' => ['acceptedFiles' => $file_types]], null , 'col-md-12')); ?>


                    <?php echo Form::hidden('currency_code', null, ['id' => 'currency_code', 'v-model' => 'form.currency_code']); ?>

                    <?php echo Form::hidden('currency_rate', null, ['id' => 'currency_rate', 'v-model' => 'form.currency_rate']); ?>

                </div>
            </div>

            <div class="card-footer">
                <div class="row save-buttons">
                    <?php echo e(Form::saveButtons('transfers.index')); ?>

                </div>
            </div>
        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <script type="text/javascript">
    </script>

    <script src="<?php echo e(asset('public/js/banking/transfers.js?v=' . version('short'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/banking/transfers/create.blade.php ENDPATH**/ ?>