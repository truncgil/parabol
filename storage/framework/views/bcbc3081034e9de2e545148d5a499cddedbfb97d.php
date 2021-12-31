

<?php $__env->startSection('title', "Kullanıcı Listesi"); ?>
<?php $__env->startSection('content'); ?>
<?php $id = company_id(); 
if($id!=1) exit();
?>
<?php 

$db = db("users")
->orderBy("last_logged_in_at","DESC")
->get();

?>

<div class="card">
    <div class="card-body text-center">
            <img src="<?php echo e(url("public/img/parabol.svg")); ?>" style="width:300px;" class="img-fluid" alt="">
            <h1 style="font-size:80px;"><?php echo e($db->count()); ?></h1>
            <p style="font-size:30px;">Kullanıcı sayısına ulaştık!</p>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/ext/user-count.blade.php ENDPATH**/ ?>