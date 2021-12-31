
<?php 
$gonderilen = db("sms")->where("company_id",company_id())->count();
$paket = db("sms_paket")->where("company_id",company_id())
->whereNotNull("json")
->select("sayi")->sum("sayi");
echo("$gonderilen/$paket ");
if($paket>$gonderilen) {
    $text = substr(get("text"),0,160);
    sms($text,get("phone"),"PARABOL",company_id());
    echo "SMS gönderilmiştir";
} else {
    echo "SMS gönderim limitiniz dolmuştur. Lütfen yeni paket satın alınız";
}
 ?>