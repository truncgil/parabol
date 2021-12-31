<?php $cid = company_id(); 
$user = db("users")->get();
$dizi = array();

foreach($user AS $u) {
    $dizi[$u->id] = $u;

}

$user = $dizi;

?>

<?php $__env->startSection('title', "Gelen Ödemeler"); ?>
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-body">
    <?php if($cid==1) {
       // print2($user);
         ?>
         <h2><?php echo e(e2("Paket Ödemeleri")); ?></h2>
         <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Üye</th>
                    <th>Tarih</th>
                    <th>Ödeme Tutarı</th>
                    <th>Bilgi</th>
                    <th>Durum</th>
                </tr>
                <?php $odemeler = db("odemeler")
                ->where("durum","<>","Ödeme Bekliyor")
                ->orderBy("id","DESC")
                ->get(); ?>
                <?php foreach($odemeler AS $o)  { 
                    $u = $user[$o->company_id];
                  ?>
                 <tr>
                     <td><?php echo e($u->name); ?> <br>
                        <small> <?php echo e($u->email); ?></small>

                     </td>
                     <td><?php echo e($o->date); ?></td>
                     <td><?php echo e($o->tutar); ?></td>
                     <td><?php echo e($o->json); ?></td>
                     <td><?php echo e($o->durum); ?></td>
                 </tr> 
                 <?php } ?>
            </table>

         </div>
         
         <h2><?php echo e(e2("SMS Ödemeleri")); ?></h2>
         <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Üye</th>
                    <th>Tarih</th>
                    <th>Ödeme Tutarı</th>
                    <th>SMS Adedi</th>
                    <th>Durum</th>
                </tr>
                <?php $odemeler = db("sms_paket")
                ->where("durum","<>","Ödeme Bekliyor")
                ->orderBy("id","DESC")
                ->get(); ?>
                <?php foreach($odemeler AS $o)  { 
                    $u = $user[$o->company_id];
                  ?>
                 <tr>
                     <td><?php echo e($u->name); ?> <br>
                        <small> <?php echo e($u->email); ?></small>

                     </td>
                     <td><?php echo e($o->date); ?></td>
                     <td><?php echo e($o->price); ?></td>
                     <td><?php echo e($o->sayi); ?></td>
                     <td><?php echo e($o->durum); ?></td>
                 </tr> 
                 <?php } ?>
            </table>

         </div>
         
         <?php 
    } ?>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/ext/gelen-odemeler.blade.php ENDPATH**/ ?>