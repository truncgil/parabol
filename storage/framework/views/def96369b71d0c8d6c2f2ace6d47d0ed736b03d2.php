
<?php $__env->startSection('title', "Mail Sistemi"); ?>
<?php $__env->startSection('content'); ?>

<?php if(company_id()==1)  { 
  ?>
  
 <div class="card">
     <div class="card-body">
         <h2>Tüm Parabol Kullanıcılarına Mail Gönder</h2>
         <?php if(getisset("gonder")) {
           $mails = explode("\n",post("mails"));
           foreach($mails AS $m) {
              $m = trim($m);
              mailsend($m,post("subject"),post("html"));
           }
           
       //     bilgi("Mailler Gönderildi");
         } 
         $users = db("users")->get();
       //  print2($users);
         $mails = array();
         foreach($users AS $us) {
             array_push($mails,$us->email);
         }
       // print2($mails);
         ?>
         <form action="/<?php echo e(company_id()); ?>/ext/mail-sistemi?gonder" method="post">
                <?php echo csrf_field(); ?>
                Mailler: 
                <textarea name="mails" id="" cols="30" rows="10" class="form-control"><?php echo e(implode("\n",$mails)); ?></textarea>
                Mail Başlığı:
                <input type="text" name="subject" id="" class="form-control">
                Mail İçeriği:
                <textarea name="html" id="editor1" cols="30" rows="10" class="form-control"></textarea>
                <button class="btn btn-primary mt-4">Gönder</button>
         </form>
     </div>
 </div> 
 <?php } ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/ext/mail-sistemi.blade.php ENDPATH**/ ?>