

<div class="card" style="padding: 0; padding-left: 15px; padding-right: 15px; border-radius: 0; box-shadow: 0 4px 16px rgba(0,0,0,.2);">
    <div class="card-body show-card-body">
        <?php if($transferTemplate): ?>
            <?php switch($transferTemplate):
                case ('second'): ?>
                    <?php if (isset($component)) { $__componentOriginal9c8eb66acbf940e50d58367e39b7a64b3298f87d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Transfers\Template\Second::class, ['transfer' => $transfer,'hideFromAccount' => ''.e($hideFromAccount).'','hideFromAccountTitle' => ''.e($hideFromAccountTitle).'','hideFromAccountName' => ''.e($hideFromAccountName).'','hideFromAccountNumber' => ''.e($hideFromAccountNumber).'','hideFromAccountBankName' => ''.e($hideFromAccountBankName).'','hideFromAccountBankPhone' => ''.e($hideFromAccountBankPhone).'','hideFromAccountBankAddress' => ''.e($hideFromAccountBankAddress).'','textFromAccountTitle' => ''.e($textFromAccountTitle).'','textFromAccountNumber' => ''.e($textFromAccountNumber).'','hideToAccount' => ''.e($hideToAccount).'','hideToAccountTitle' => ''.e($hideToAccountTitle).'','hideToAccountName' => ''.e($hideToAccountName).'','hideToAccountNumber' => ''.e($hideToAccountNumber).'','hideToAccountBankName' => ''.e($hideToAccountBankName).'','hideToAccountBankPhone' => ''.e($hideToAccountBankPhone).'','hideToAccountBankAddress' => ''.e($hideToAccountBankAddress).'','textToAccountTitle' => ''.e($textToAccountTitle).'','textToAccountNumber' => ''.e($textToAccountNumber).'','hideDetails' => ''.e($hideDetails).'','hideDetailTitle' => ''.e($hideDetailTitle).'','hideDetailDate' => ''.e($hideDetailDate).'','hideDetailPaymentMethod' => ''.e($hideDetailPaymentMethod).'','hideDetailReference' => ''.e($hideDetailReference).'','hideDetailDescription' => ''.e($hideDetailDescription).'','hideDetailAmount' => ''.e($hideDetailAmount).'','textDetailTitle' => ''.e($textDetailTitle).'','textDetailDate' => ''.e($textDetailDate).'','textDetailPaymentMethod' => ''.e($textDetailPaymentMethod).'','textDetailReference' => ''.e($textDetailReference).'','textDetailDescription' => ''.e($textDetailDescription).'','textDetailAmount' => ''.e($textDetailAmount).'']); ?>
<?php $component->withName('transfers.template.second'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal9c8eb66acbf940e50d58367e39b7a64b3298f87d)): ?>
<?php $component = $__componentOriginal9c8eb66acbf940e50d58367e39b7a64b3298f87d; ?>
<?php unset($__componentOriginal9c8eb66acbf940e50d58367e39b7a64b3298f87d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    <?php break; ?>
                <?php case ('third'): ?>
                    <?php if (isset($component)) { $__componentOriginale047419defd7496908253914ca383b217c110de7 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Transfers\Template\Third::class, ['transfer' => $transfer,'hideFromAccount' => ''.e($hideFromAccount).'','hideFromAccountTitle' => ''.e($hideFromAccountTitle).'','hideFromAccountName' => ''.e($hideFromAccountName).'','hideFromAccountNumber' => ''.e($hideFromAccountNumber).'','hideFromAccountBankName' => ''.e($hideFromAccountBankName).'','hideFromAccountBankPhone' => ''.e($hideFromAccountBankPhone).'','hideFromAccountBankAddress' => ''.e($hideFromAccountBankAddress).'','textFromAccountTitle' => ''.e($textFromAccountTitle).'','textFromAccountNumber' => ''.e($textFromAccountNumber).'','hideToAccount' => ''.e($hideToAccount).'','hideToAccountTitle' => ''.e($hideToAccountTitle).'','hideToAccountName' => ''.e($hideToAccountName).'','hideToAccountNumber' => ''.e($hideToAccountNumber).'','hideToAccountBankName' => ''.e($hideToAccountBankName).'','hideToAccountBankPhone' => ''.e($hideToAccountBankPhone).'','hideToAccountBankAddress' => ''.e($hideToAccountBankAddress).'','textToAccountTitle' => ''.e($textToAccountTitle).'','textToAccountNumber' => ''.e($textToAccountNumber).'','hideDetails' => ''.e($hideDetails).'','hideDetailTitle' => ''.e($hideDetailTitle).'','hideDetailDate' => ''.e($hideDetailDate).'','hideDetailPaymentMethod' => ''.e($hideDetailPaymentMethod).'','hideDetailReference' => ''.e($hideDetailReference).'','hideDetailDescription' => ''.e($hideDetailDescription).'','hideDetailAmount' => ''.e($hideDetailAmount).'','textDetailTitle' => ''.e($textDetailTitle).'','textDetailDate' => ''.e($textDetailDate).'','textDetailPaymentMethod' => ''.e($textDetailPaymentMethod).'','textDetailReference' => ''.e($textDetailReference).'','textDetailDescription' => ''.e($textDetailDescription).'','textDetailAmount' => ''.e($textDetailAmount).'']); ?>
<?php $component->withName('transfers.template.third'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginale047419defd7496908253914ca383b217c110de7)): ?>
<?php $component = $__componentOriginale047419defd7496908253914ca383b217c110de7; ?>
<?php unset($__componentOriginale047419defd7496908253914ca383b217c110de7); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    <?php break; ?>
                <?php default: ?>
                    <?php if (isset($component)) { $__componentOriginal74f442d5e8e19ef6e82109e39f7003f916c1c1a4 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Transfers\Template\Ddefault::class, ['transfer' => $transfer,'hideFromAccount' => ''.e($hideFromAccount).'','hideFromAccountTitle' => ''.e($hideFromAccountTitle).'','hideFromAccountName' => ''.e($hideFromAccountName).'','hideFromAccountNumber' => ''.e($hideFromAccountNumber).'','hideFromAccountBankName' => ''.e($hideFromAccountBankName).'','hideFromAccountBankPhone' => ''.e($hideFromAccountBankPhone).'','hideFromAccountBankAddress' => ''.e($hideFromAccountBankAddress).'','textFromAccountTitle' => ''.e($textFromAccountTitle).'','textFromAccountNumber' => ''.e($textFromAccountNumber).'','hideToAccount' => ''.e($hideToAccount).'','hideToAccountTitle' => ''.e($hideToAccountTitle).'','hideToAccountName' => ''.e($hideToAccountName).'','hideToAccountNumber' => ''.e($hideToAccountNumber).'','hideToAccountBankName' => ''.e($hideToAccountBankName).'','hideToAccountBankPhone' => ''.e($hideToAccountBankPhone).'','hideToAccountBankAddress' => ''.e($hideToAccountBankAddress).'','textToAccountTitle' => ''.e($textToAccountTitle).'','textToAccountNumber' => ''.e($textToAccountNumber).'','hideDetails' => ''.e($hideDetails).'','hideDetailTitle' => ''.e($hideDetailTitle).'','hideDetailDate' => ''.e($hideDetailDate).'','hideDetailPaymentMethod' => ''.e($hideDetailPaymentMethod).'','hideDetailReference' => ''.e($hideDetailReference).'','hideDetailDescription' => ''.e($hideDetailDescription).'','hideDetailAmount' => ''.e($hideDetailAmount).'','textDetailTitle' => ''.e($textDetailTitle).'','textDetailDate' => ''.e($textDetailDate).'','textDetailPaymentMethod' => ''.e($textDetailPaymentMethod).'','textDetailReference' => ''.e($textDetailReference).'','textDetailDescription' => ''.e($textDetailDescription).'','textDetailAmount' => ''.e($textDetailAmount).'']); ?>
<?php $component->withName('transfers.template.ddefault'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal74f442d5e8e19ef6e82109e39f7003f916c1c1a4)): ?>
<?php $component = $__componentOriginal74f442d5e8e19ef6e82109e39f7003f916c1c1a4; ?>
<?php unset($__componentOriginal74f442d5e8e19ef6e82109e39f7003f916c1c1a4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
            <?php endswitch; ?>
        <?php else: ?>
            <?php echo $__env->make($transferTemplate, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/components/transfers/show/transfer.blade.php ENDPATH**/ ?>