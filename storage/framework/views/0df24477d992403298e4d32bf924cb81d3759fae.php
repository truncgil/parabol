

    
    <?php 

    if (View::exists("ext.$id")) {
        ?>
        <?php echo $__env->make("ext.$id", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php 
    }
    ?>
    



<?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/ext/default.blade.php ENDPATH**/ ?>