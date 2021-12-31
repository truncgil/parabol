
<?php 
$_POST['name'] = company_id(); 
$_POST['surname'] = "Parabol"; 
$_POST['address'] = "Emek Mh. Cemil Alevli Cad 19028 Nolu Sk. Asım Bey Apt Altı 4/A Şehitkamil/Gaziantep"; 
$_POST['phone'] = "05512343695"; 
$_POST['cur'] = "TRY"; 
$cid = company_id();
$paketler = [
    59 => 500,
    99 => 1000,
    179 => 2000,
    279 => 3000
];
$price = 99;
$adet = $paketler[$price];

if(getisset("price")) {
    $price = get("price");
    if(isset($paketler[$price])) {
        $adet = $paketler[$price];
    } else {
        echo "Tehlikeli sularda yüzüyorsunuz!";
        exit();
    }
    
}

?>

<?php $__env->startSection('title', "Ödeme Yapın"); ?>
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-body text-center">

    <!-- Nav tabs -->
<ul class="nav nav2 nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#home">Yeni SMS Paketi Satın Al</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu1">Toplu SMS Gönder</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu2">SMS Kullanım Bilgileriniz</a>
  </li>
</ul>
<style>
    @media  screen and (max-width:768px) {
        .nav2 {
            white-space: nowrap;
            overflow: auto;
            flex-wrap: unset;

        }
    }
       
</style>
<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container active" id="home">
        <?php echo $__env->make("ext.sms-paketi.satin-al", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
  </div>
  <div class="tab-pane container fade" id="menu1">
        <?php echo $__env->make("ext.sms-paketi.toplu-sms", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
  </div>
  <div class="tab-pane container fade" id="menu2">
        <?php echo $__env->make("ext.sms-paketi.kullanim-bilgileri", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
</div>
        
        <?php //echo "$price $adet"; ?>
        
 
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/ext/sms-paketi-al.blade.php ENDPATH**/ ?>