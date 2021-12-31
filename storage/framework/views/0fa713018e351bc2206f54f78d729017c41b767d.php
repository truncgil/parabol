<?php $__env->startSection('title', setting('invoice.title', trans_choice('general.invoices', 1)) . ': ' . $invoice->document_number); ?>

<?php $__env->startSection('new_button'); ?>

    <?php if (isset($component)) { $__componentOriginale972011868b1174ce26941ef8ab555616856c4a3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Documents\Show\TopButtons::class, ['type' => 'invoice','document' => $invoice]); ?>
<?php $component->withName('documents.show.top-buttons'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginale972011868b1174ce26941ef8ab555616856c4a3)): ?>
<?php $component = $__componentOriginale972011868b1174ce26941ef8ab555616856c4a3; ?>
<?php unset($__componentOriginale972011868b1174ce26941ef8ab555616856c4a3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $i = $invoice;
    //print2($i);
    
    ?>
    <?php if($i->efatura=="") { ?>
        <div class="btn btn-danger efatura d-none">E-Fatura'ya Gönder</div>
    <?php } else { ?>
    <div class="btn btn-success efatura-print d-none">E-Fatura'yı Yazdır</div>
    <?php } ?>
    <?php 
    
    /*
    [id] => 9
            [company_id] => 1
            [type] => invoice
            [document_number] => INV-00006
            [order_number] => 
            [status] => sent
            [issued_at] => 2021-08-21 12:03:52
            [due_at] => 2021-08-21 12:03:52
            [amount] => 10159.8
            [currency_code] => TRY
            [currency_rate] => 1
            [category_id] => 2
            [contact_id] => 241
            [contact_name] => HALITLAR GIDA VE SAĞLIK ÜRÜNLERİ
            [contact_email] => 
            [contact_tax_number] => 
            [contact_phone] => 
            [contact_address] => 
            [notes] => 
            [footer] => 
            [parent_id] => 0
            [created_by] => 1
            [created_at] => 2021-08-21 12:03:53
            [updated_at] => 2021-08-21 12:04:20
            [deleted_at] => 
            [efatura] => 
        )

    [original:protected] => Array
        (
            [id] => 9
            [company_id] => 1
            [type] => invoice
            [document_number] => INV-00006
            [order_number] => 
            [status] => sent
            [issued_at] => 2021-08-21 12:03:52
            [due_at] => 2021-08-21 12:03:52
            [amount] => 10159.8
            [currency_code] => TRY
            [currency_rate] => 1
            [category_id] => 2
            [contact_id] => 241
            [contact_name] => HALITLAR GIDA VE SAĞLIK ÜRÜNLERİ
            [contact_email] => 
            [contact_tax_number] => 
            [contact_phone] => 
            [contact_address] => 
            [notes] => 
            [footer] => 
            [parent_id] => 0
            [created_by] => 1
            [created_at] => 2021-08-21 12:03:53
            [updated_at] => 2021-08-21 12:04:20
            [deleted_at] => 
            [efatura] => 
    */
   $data = [
    "belgeNumarasi" => "",
    "faturaTarihi" => date("d/m/Y",strtotime($i->issued_at)),
    "saat" => date("H:i:s",strtotime($i->issued_at)),
    "paraBirimi" => $i->currency_code,
    "dovzTLkur" => "0",
    "faturaTipi" => "SATIS",
    "vknTckn" =>  ed($i->contact_tax_number,"11111111111"),
    "aliciUnvan" => $i->contact_name,
    "aliciAdi" => $i->contact_name,
    "aliciSoyadi" => $i->contact_name,
    "binaAdi" => "",
    "binaNo" => "",
    "kapiNo" => "",
    "kasabaKoy" => "",
    "vergiDairesi" => "SAHINBEY",
    "ulke" => "Türkiye",
    "bulvarcaddesokak" => $i->contact_address,
    "mahalleSemtIlce" => "",
    "sehir" => " ",
    "postaKodu" => "",
    "tel" => $i->contact_phone,
    "fax" => "",
    "eposta" => "",
    "websitesi" => "",
    "iadeTable" => [],
    "ozelMatrahTutari" => "0",
    "ozelMatrahOrani" => 0,
    "ozelMatrahVergiTutari" => "0",
    "vergiCesidi" => " ",
    "malHizmetTable" => [],
    "tip" => "İskonto",
    "matrah" => 0,
    "malhizmetToplamTutari" => 0,
    "toplamIskonto" => "0",
    "hesaplanankdv" => 0,
    "vergilerToplami" => 0,
    "vergilerDahilToplamTutar" => 0,
    "odenecekTutar" => 0,
    "not" => "xxx",
    "siparisNumarasi" => "",
    "siparisTarihi" => "",
    "irsaliyeNumarasi" => "",
    "irsaliyeTarihi" => "",
    "fisNo" => "",
    "fisTarihi" => "",
    "fisSaati" => " ",
    "fisTipi" => " ",
    "zRaporNo" => "",
    "okcSeriNo" => ""
];
$items = db("document_items")->where("document_id",$i->id)->get();
foreach($items AS $pi) {
    $data["malHizmetTable"][] = [
        "malHizmet" => $pi->name,
        "miktar" => $pi->quantity,
        "birim" => "C62",
        "birimFiyat" => $pi->price,
        "fiyat" => $pi->total,
        "iskontoNedeni" => "İskonto",
        "iskontoOrani" => 0,
        "iskontoTutari" => "0",
        "iskontoNedeni" => "",
        "malHizmetTutari" => $pi->price + $pi->tax,
        "kdvOrani" => 18,
        "kdvTutari" => $pi->tax,
        "vergininKdvTutari" => "0"
    ];
    $data['matrah'] += $pi->price;
    $data['hesaplanankdv'] += $pi->tax;
    $data['malhizmetToplamTutari'] += $pi->price;
    $data['vergilerToplami'] += $pi->tax;
    $data['vergilerDahilToplamTutar'] += $pi->price + $pi->tax;
    $data['odenecekTutar'] += $pi->price + $pi->tax;
}



// print2($company_id);

$json = base64_encode(json_encode_tr($data));

?>
<script>
    $(function(){
        function IsJsonString(str) {
            try {
                JSON.parse(str);
            } catch (e) {
                return false;
            }
            return true;
        }
        $(".efatura").on("click",function(){
            var json = "<?php echo $json; ?>";
            console.log(json);
            $.post('https://fatura.truncgil.com',{
                data : json,
                user : "33333302",
                pass : "1"
            },function(d){
                var win = window.open("", "E-Fatura", "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=400,top=0,left=0");
                win.document.body.innerHTML = d + '<br><small><img src="https://app.parabol.truncgil.com/public/img/parabol.svg" width="200" alt=""> ile tasarlandı.</small>';
                /*
                console.log(d);
                if(IsJsonString(d)) {
                    console.log(d);
                } else {
                    console.log("hata");
                }
                */
                
            });
           // location.href='https://fatura.truncgil.com/?data=' + json;
        });
    });
</script>
    <?php if (isset($component)) { $__componentOriginal778df7e5316940e9a16de286ce9c99fa694189b4 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Documents\Show\Content::class, ['type' => 'invoice','document' => $invoice,'hideButtonReceived' => true]); ?>
<?php $component->withName('documents.show.content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal778df7e5316940e9a16de286ce9c99fa694189b4)): ?>
<?php $component = $__componentOriginal778df7e5316940e9a16de286ce9c99fa694189b4; ?>
<?php unset($__componentOriginal778df7e5316940e9a16de286ce9c99fa694189b4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts_start'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/css/print.css?v=' . version('short'))); ?>" type="text/css">

    <?php if (isset($component)) { $__componentOriginal91e872910bc77530ae90fd36b7e9262661a0942c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Documents\Script::class, ['type' => 'invoice']); ?>
<?php $component->withName('documents.script'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal91e872910bc77530ae90fd36b7e9262661a0942c)): ?>
<?php $component = $__componentOriginal91e872910bc77530ae90fd36b7e9262661a0942c; ?>
<?php unset($__componentOriginal91e872910bc77530ae90fd36b7e9262661a0942c); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pgutrunc/app.parabol.truncgil.com/resources/views/sales/invoices/show.blade.php ENDPATH**/ ?>