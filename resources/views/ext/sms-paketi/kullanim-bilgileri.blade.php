<?php $gonderilen = db("sms")->where("company_id",company_id())->count();
$alinan_paket = db("sms_paket")->where("company_id",company_id())
->whereNotNull("json")
->select("sayi")->sum("sayi"); ?>
        <h2>SMS Kullanım Bilgileriniz</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tr>
                    <td>Toplam Alınan SMS Adedi</td>
                    <th>{{$alinan_paket}}</th>
                </tr>
                <tr>
                    <td>Toplam Gönderilen SMS Adedi</td>
                    <th>{{$gonderilen}}</th>
                </tr>
                <tr>
                    <td>Kalan SMS Adedi</td>
                    <th>{{$alinan_paket - $gonderilen}}</th>
                </tr>
                
            </table>
        </div>