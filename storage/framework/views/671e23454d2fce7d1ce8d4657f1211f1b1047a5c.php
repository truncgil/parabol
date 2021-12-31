<?php $gonderilen = db("sms")->where("company_id",company_id())->count();
$alinan_paket = db("sms_paket")->where("company_id",company_id())
->whereNotNull("json")
->select("sayi")->sum("sayi"); ?>
        <h2>SMS Kullanım Bilgileriniz</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tr>
                    <td>Toplam Alınan SMS Adedi</td>
                    <th><?php echo e($alinan_paket); ?></th>
                </tr>
                <tr>
                    <td>Toplam Gönderilen SMS Adedi</td>
                    <th><?php echo e($gonderilen); ?></th>
                </tr>
                <tr>
                    <td>Kalan SMS Adedi</td>
                    <th><?php echo e($alinan_paket - $gonderilen); ?></th>
                </tr>
                
            </table>
        </div><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/ext/sms-paketi/kullanim-bilgileri.blade.php ENDPATH**/ ?>