<div class="row document-item-body">
    <div class="col-sm-12 mb-4 p-0">
        <div class="table-responsive overflow-x-scroll overflow-y-hidden">
            <table class="table" id="totals">
                <colgroup>
                    <col class="document-total-50">
                    <col class="document-total-30">
                    <col class="document-total-25">
                    <col class="document-total-50-px">
                </colgroup>
                <tbody id="invoice-total-rows" class="table-padding-05">
                    <?php echo $__env->yieldPushContent('sub_total_td_start'); ?>
                    <tr id="tr-subtotal">
                        <td class="border-bottom-0 pb-0"></td>
                        <td class="text-right border-right-0 border-bottom-0 align-middle pb-0 pr-0">
                            <strong><?php echo e(trans('invoices.sub_total')); ?></strong>
                        </td>
                        <td class="text-right border-bottom-0 long-texts pb-0 pr-3">
                            <div>
                                <?php echo e(Form::moneyGroup('sub_total', '', '', ['disabled' => 'true' , 'row-input' => 'true', 'v-model' => 'totals.sub', 'currency' => $currency, 'dynamic-currency' => 'currency', 'money-class' => 'text-right disabled-money'], 0.00, 'text-right disabled-money')); ?>

                            </div>
                        </td>
                        <td class="border-bottom-0 pb-0" style="max-width: 50px"></td>
                    </tr>
                    <?php echo $__env->yieldPushContent('sub_total_td_end'); ?>

                <?php if(in_array(setting('localisation.discount_location', 'total'), ['item', 'both'])): ?>
                    <?php echo $__env->yieldPushContent('item_discount_td_start'); ?>
                        <tr id="tr-line-discount" v-if="totals.item_discount">
                            <td class="border-top-0 pt-0 pb-0"></td>
                            <td class="text-right border-top-0 border-right-0 border-bottom-0 align-middle pt-0 pb-0 pr-0">
                                <strong><?php echo e(trans('invoices.item_discount')); ?></strong>
                            </td>
                            <td class="text-right border-top-0 border-bottom-0 long-texts pt-0 pb-0 pr-3">
                                <div>
                                    <?php echo e(Form::moneyGroup('item_discount', '', '', ['disabled' => 'true' , 'row-input' => 'true', 'v-model' => 'totals.item_discount', 'currency' => $currency, 'dynamic-currency' => 'currency', 'money-class' => 'text-right disabled-money'], 0.00, 'text-right disabled-money')); ?>

                                </div>
                            </td>
                            <td class="border-top-0 pt-0 pb-0" style="max-width: 50px"></td>
                        </tr>
                    <?php echo $__env->yieldPushContent('item_discount_td_end'); ?>
                <?php endif; ?>

                <?php if(in_array(setting('localisation.discount_location', 'total'), ['total', 'both'])): ?>
                    <?php echo $__env->yieldPushContent('add_discount_td_start'); ?>
                        <tr id="tr-discount">
                            <td class="border-top-0 pt-0 pb-0"></td>
                            <td class="text-right border-top-0 border-right-0 border-bottom-0 align-middle pt-0 pb-0 pr-0">
                                <el-popover
                                    popper-class="p-0 h-0"
                                    placement="bottom"
                                    width="300"
                                    v-model="discount">
                                    <div class="card d-none" :class="[{'show' : discount}]">
                                        <div class="discount card-body">
                                            <div class="row align-items-center">
                                                <div class="col-sm-6">
                                                    <div class="input-group input-group-merge">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="input-discount">
                                                                <i class="fa fa-percent"></i>
                                                            </span>
                                                        </div>
                                                        <?php echo Form::number('pre_discount', null, ['id' => 'pre-discount', 'class' => 'form-control', 'v-model' => 'form.discount']); ?>

                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="discount-description">
                                                        <strong><?php echo e(trans('invoices.discount_desc')); ?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="discount card-footer">
                                            <div class="row float-right">
                                                <div class="col-xs-12 col-sm-12">
                                                    <a href="javascript:void(0)" @click="discount = false" class="btn btn-outline-secondary" @click="closePayment">
                                                        <?php echo e(trans('general.cancel')); ?>

                                                    </a>
                                                    <?php echo Form::button(trans('general.save'), ['type' => 'button', 'id' => 'save-discount', '@click' => 'onAddTotalDiscount', 'class' => 'btn btn-success']); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <el-link class="cursor-pointer text-info" slot="reference" type="primary" v-if="!totals.discount_text"><?php echo e(trans('invoices.add_discount')); ?></el-link>
                                    <el-link slot="reference" type="primary" v-if="totals.discount_text" v-html="totals.discount_text"></el-link>
                                </el-popover>
                            </td>
                            <td class="text-right border-top-0  border-bottom-0 pt-0 pb-0 pr-3">
                                <div>
                                    <?php echo e(Form::moneyGroup('discount_total', '', '', ['disabled' => 'true' , 'row-input' => 'true', 'v-model' => 'totals.discount', 'currency' => $currency, 'dynamic-currency' => 'currency', 'money-class' => 'text-right disabled-money'], 0.00, 'text-right disabled-money')); ?>

                                </div>
                                <?php echo Form::hidden('discount', null, ['id' => 'discount', 'class' => 'form-control text-right', 'v-model' => 'form.discount']); ?>

                            </td>
                            <td class="border-top-0 pt-0 pb-0" style="max-width: 50px"></td>
                        </tr>
                    <?php echo $__env->yieldPushContent('add_discount_td_end'); ?>
                <?php endif; ?>

                <?php echo $__env->yieldPushContent('tax_total_td_start'); ?>
                    <tr v-for="(tax, tax_index) in totals.taxes"
                    :index="tax_index">
                        <td class="border-top-0 pt-0 pb-0"></td>
                        <td class="text-right border-top-0  border-right-0 border-bottom-0 align-middle pt-0 pb-0 pr-0">
                            <strong v-html="tax.name"></strong>
                        </td>
                        <td class="text-right border-top-0 border-bottom-0 long-texts pb-0 pr-3">
                            <div>
                                <?php echo e(Form::moneyGroup('tax_total', '', '', ['disabled' => 'true' , 'row-input' => 'true', 'v-model' => 'tax.total', 'currency' => $currency, 'dynamic-currency' => 'currency', 'money-class' => 'text-right disabled-money'], 0.00, 'text-right disabled-money')); ?>

                            </div>
                        </td>
                        <td class="border-top-0 pt-0 pb-0" style="max-width: 50px"></td>
                    </tr>
                <?php echo $__env->yieldPushContent('tax_total_td_end'); ?>

                <?php echo $__env->yieldPushContent('grand_total_td_start'); ?>
                    <tr id="tr-total">
                        <td class="border-top-0 pt-0 pb-0"></td>
                        <td class="text-right border-top-0 border-right-0 align-middle pt-0 pb-0 pr-0">
                            <strong class="document-total-span"><?php echo e(trans('invoices.total')); ?></strong>
                            <?php echo e(Form::selectGroup('currency_code', '', 'exchange-alt', $currencies, $currency->code, ['required' => 'required', 'model' => 'form.currency_code', 'change' => 'onChangeCurrency'], 'document-total-currency')); ?>

                            <?php echo Form::hidden('currency_rate', (!empty($document)) ? $document->currency_rate : $currency->rate, ['id' => 'currency_rate', 'class' => 'form-control', 'required' => 'required']); ?>

                        </td>
                        <td class="text-right border-top-0 long-texts pt-0 pb-0 pr-3">
                            <div>
                                <?php echo e(Form::moneyGroup('grand_total', '', '', ['disabled' => 'true' , 'row-input' => 'true', 'v-model' => 'totals.total', 'currency' => $currency, 'dynamic-currency' => 'currency', 'money-class' => 'text-right disabled-money'], 0.00, 'text-right disabled-money')); ?>

                            </div>
                        </td>
                        <td class="border-top-0 pt-0 pb-0" style="max-width: 50px"></td>
                    </tr>
                    <?php echo $__env->yieldPushContent('grand_total_td_end'); ?>

                    <?php echo $__env->yieldPushContent('currency_conversion_td_start'); ?>
                        <tr id="tr-currency-conversion" class="d-none" :class="[{'d-table-row': (('<?php echo e($currency->code); ?>' != form.currency_code) && totals.total || dropdown_visible)}]">
                            <td class="border-top-0 pb-0"></td>
                            <td class="text-right border-top-0 border-right-0 align-middle pb-0 pr-3 pr-0" colspan="2">
                                <akaunting-currency-conversion
                                    currency-conversion-text="<?php echo e(trans('currencies.conversion')); ?>"
                                    :price="(totals.total / form.currency_rate).toFixed(2)"
                                    :currecy-code="form.currency_code"
                                    :currency-rate="form.currency_rate"
                                    :currency-symbol="currency_symbol"
                                    @change="form.currency_rate = $event"
                                ></akaunting-currency-conversion>
                            </td>
                            <td class="border-top-0 pt-0 pb-0" style="max-width: 50px"></td>
                        </tr>
                        <?php echo $__env->yieldPushContent('currency_conversion_td_end'); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/components/documents/form/totals.blade.php ENDPATH**/ ?>