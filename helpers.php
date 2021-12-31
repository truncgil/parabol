<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

function mail_template_upgrade($cid) {
$templates = db("email_templates")->where("company_id",$cid)->get(); 
if($templates->count()==0) {
    $templates = db("email_templates")->where("company_id",1)->get();  //ana kullanıcıya ait olanı alıyoruz
    foreach($templates AS $temp) {
        ekle([
            "company_id" => $cid,
            "alias" => $temp->alias,
            "class" => $temp->class,
            "name" => $temp->name,
            "subject" => $temp->subject,
            "body" => $temp->body
        ],"email_templates");
       // bilgi("E-Posta şablonları oluşturuldu");
        $templates = db("email_templates")->where("company_id",$cid)->get(); 
    }
    
}
$email_settings = db("settings")->where("company_id",1)->where("key","like","email%")->get();
//print2($email_settings);
foreach($email_settings AS $es) {
    $varmi = db("settings")
    ->where("company_id",$cid)
    ->where("key",$es->key)->get();
    if($varmi->count()==0) {
        ekle([
            "value"=>$es->value,
            "company_id"=>$cid,
            "key"=>$es->key

        ],"settings");
    } else {
        db("settings")
        ->where("company_id",$cid)
        ->where("key",$es->key)
        ->update([
            "value"=>$es->value
        ]); 
    }
    
}
db("settings")
        ->where("company_id",$cid)
        ->where("key","company.email")
        ->update([
            "value"=>"info@truncgil.com"
        ]);  
        return $templates;
}
function sms($msj,$tel,$baslik="PARABOL",$company_id="") {
	//$msj = smstext($msj);
    //$msj = Str::slug($msj);
    //$msj = slugtotitle($msj);
	$msj = str_replace("&nbsp","",$msj);
	//$msj = slug($msj," ");
	//$msj = strtoupper($msj);
$ilk = substr($tel,0,1);
$tel = str_replace(" ","",$tel);

if($ilk==0) {
	$tel = substr($tel,1,strlen($tel));
}

//e($tel);
		$simdi = simdi();
		$xml ="
				<BILGI>
				  <KULLANICI_ADI></KULLANICI_ADI>
				  <SIFRE></SIFRE>
				  <GONDERIM_TARIH></GONDERIM_TARIH> 
				  <BASLIK>$baslik</BASLIK>  
				</BILGI>
				<ISLEM>
				  <YOLLA>
					<MESAJ>$msj</MESAJ>
					<NO>$tel</NO>
				  </YOLLA>
				</ISLEM>

		";
		$result = sendRequest('http://www.mesaj34.com/services/api.php?islem=sms',$xml,array('Content-Type: text/xml'));
		/*
		dEkle("sms",array(
			"title" => "$tel",
			"html" => "$msj",
			"date" => simdi()
		));
		*/
		//error_log("$tel : $result \n",3,"sms.log");  
		ekle([
            'text'=>$msj,
            "phone" => $tel,
            "date" => simdi(),
            "company_id" => $company_id,
            "title" => $baslik
        ],"sms");
		return $result;
	}
	function sendRequest($site_name,$send_xml,$header_type) {

    	//die('SITENAME:'.$site_name.'SEND XML:'.$send_xml.'HEADER TYPE '.var_export($header_type,true));
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL,$site_name);
    	curl_setopt($ch, CURLOPT_POST, 0);
    	curl_setopt($ch, CURLOPT_POSTFIELDS,$send_xml);
    	@curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    	curl_setopt($ch, CURLOPT_HTTPHEADER,$header_type);
    	curl_setopt($ch, CURLOPT_HEADER, 0);
    	@curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
    	curl_setopt($ch, CURLOPT_TIMEOUT, 120);

		curl_exec($ch);

    	return $ch;
}


function contact_update($id="") { // ilgili kişinin güncelleme alanını son tarihe günceller.
    global $_POST;
    if($id=="") $id = post("contact_id");
    db("contacts")->where("id",$id)
            ->update([
                "updated_at" => simdi()
            ]);
}
function cfg($slug) {
    $c = db("contents")
    ->Where("kid","configuration-".$slug)
    ->get();
    $cikti = array();
    foreach($c AS $s) {
        array_push($cikti,$s->title);
    }
    return $cikti;
}
function virgul_to_nokta($text) {
    $text =  str_replace(".","",$text);
    $text =  str_replace(",",".",$text);
    $text = str_replace("%","",$text);
    return $text;
}
function finans_api() {
    $finans = file_get_contents("https://finans.truncgil.com/v4/today.json");
    $finans = json_decode($finans,true);
    unset($finans['Update_Date']);
    foreach($finans AS $alan => $deger) {
        $alan2 = $alan;
        /*
        $alan2 = strtoupper(str_replace("-","",$alan));
        if($alan=="22-ayar-bilezik") $alan2 = "BILEZIK";
        if($alan=="gram-altin") $alan2 = "GRAMALTIN";
        if($alan=="14-ayar-altin") $alan2 = "ONDORTAYARALTIN";
        if($alan=="18-ayar-altin") $alan2 = "ONSEKIZAYARALTIN";
        */
       // if(isset($finans[$alan2]['Buying'])) {
            @$finans[$alan2]['Buying'] = ($deger['Buying']);
       // }
        //if(isset($finans[$alan2]['Selling'])) {
            @$finans[$alan2]['Selling'] = ($deger['Selling']);
        //}
       
    }
   // print2($finans); exit();
    return $finans;
}
function my_order_query() {
    global $_SESSION;
    $sorgu = db("inquiry")
    ->select("*","inquiry.y AS yy","inquiry.type AS ytype","inquiry.id AS yid","invoice.id AS eid","invoice.json AS ejson","inquiry.json AS yjson","inquiry.files AS yfiles")
    ->join("invoice","invoice.kid","=","inquiry.id")
    ->where("inquiry.uid",oturum("uid"))
    ->groupBy("inquiry.id");
    return $sorgu;
}
function mailtemp($mail,$name,$data="") {
    $temp = db("contents")->where("title",$name)->first();
    $html = $temp->html;
    $subject = $temp->title2;
    if(is_array($data)) {
        foreach($data AS $a => $d) {
            $html = str_replace("{".$a."}",$d,$html);
            $subject = str_replace("{".$a."}",$d,$subject);
        }
    }
    
    @mailsend($mail,$subject,$html);
}
function payment_update($inquiry,$invoice) {
    $i = db("inquiry")->where("id",$inquiry)->first();
    $e = db("invoice")->where("id",$invoice)->first();
    $odenen = total_payment($inquiry);
    $total = $e->fob;
    if($odenen=="") {
        $odenen=0;
    }
    $kalan = $total - $odenen;
    $array['total'] = $odenen; 
    $array['remaining'] = $kalan;
    $type = "Due to Payment";
    if($kalan==0) {
        $type = "Payment Complete";
    }
    $dizi = [
        "remaining" => $kalan,
        "type" => $type,
        "total" => $odenen
    ];
  //  print_r($dizi);exit();
    //bilgi amaçlı güncelliyoruz inqury ve invoice alanlarından
    db("inquiry")->where("id",$i->id)->update($dizi);
    db("invoice")->where("id",$e->id)->update($dizi);
    return $dizi;
}
function total_payment($inquiry) { //bir order a ait ödenen toplam tutarı döndürür.
    $sorgu = db("payments")->select(DB::raw('SUM(fob) AS toplam'))->where("inquiry",$inquiry)->first();
//    print_R($sorgu); exit();
    return $sorgu->toplam;
}
function total($tablo,$col,$val) {
    $sorgu = db($tablo)->where($col,$val)->get($col);
    return count($sorgu);
}
function variable($title) {
    $s = db("contents")->where("title",$title)->first();
    return $s->html;
}
function df($date,$format="d.m.Y H:i") {
    return date($format,strtotime($date));
}
function mailsend($to="",$subject="",$html="",$link="https://app.parabol.truncgil.com",$linkyazi="Parabol'ü Açın") {
    //VBgDMfu6L5kksh noreply@truncgil.com
  
    $data = array(
        'text'=>$html,
        "link" => $link,
        "linkyazi" => $linkyazi,
        "subject" => $subject,
        "to" => $to 
    );
  //  print_r($data);
    $title = "Parabol";
    try {
        Mail::send("mail-template", $data, function($message) use($to, $subject,$title){
        
            $message->from("info@truncgil.com", $title);
            $message->to($to);
            $message->subject($subject);
        });
       bilgi("$to Mail Gönderildi"); 
    } catch (\Throwable $th) {
        throw $th;
    }
    /*
    ekle([
        "mail" => $to,
        "subject" =>  $subject,
        "created_at" => simdi(),
        "html" => $html
    ],"notification");
    */

    
}
function countries() {
    $countries = cfg3("countries");// array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
    return $countries;
}
function alert($text,$type="success") {
     ?>
     <div class="alert alert-<?php echo $type ?>"><?php echo $text ?></div>
     <?php 
}
function catalog() {
    return db("catalog_base");
}
function iptolocation() {
    $j = file_get_contents("http://ip-api.com/json/{$_SERVER['REMOTE_ADDR']}");
    $j = json_decode($j);
    if($j->country == "United States") {
        $j->country = "USA";
    }
    return $j;
    
}
function catalog_make() {
    $sorgu = catalog()->groupBy("COMPANY")->orderBY("COMPANY","ASC")->get("COMPANY");
    $dizi = array();
    foreach($sorgu AS $s) {
        array_push($dizi,$s->COMPANY);
    }
    return $dizi;
}
function get_model($make) {
    $sorgu = catalog()->where("COMPANY",$make)->get("MODEL_NAME");
    $dizi = array();
    foreach($sorgu AS $s) {
        if(!in_array($s->MODEL_NAME,$dizi)) {
            array_push($dizi,$s->MODEL_NAME);
        }
        
    }
    return $dizi;
}
function get_model_type($make,$model) {
    $sorgu = catalog()
    ->where("COMPANY",$make)
    ->where("MODEL_NAME",$model)
    ->first("MODEL_TYPE");
    return $sorgu->MODEL_TYPE;
}
function get_weight($q) {
    $sorgu = catalog()->where("MODEL_TYPE",$q)->first("TOTAL_LWH");
    $sorgu = $sorgu->TOTAL_LWH;
  //  $sorgu = str_replace("mm","",$sorgu);
    $sorgu = explode("*",$sorgu);
  //  print_r($sorgu);exit();
    $sonuc['lenght'] = $sorgu[0];
    $sonuc['width'] = $sorgu[1];
    $sonuc['height'] = $sorgu[2];
    return $sonuc;
}
function ed($text,$elsetext) {
    if($text=="") return $elsetext;
    else return $text;
}
function sales_status($y="") {
    if($y=="") {
        return explode(",","Under Negotiate,Due to Payment,Payment Complete,Booking,Shipment,Sold");
    }
    
}
function logistic_status($y="") {
    if($y=="") {
        return explode(",","Waiting to Booking,Documents,Exported");
    }
    
}
function document_type() {
    return explode(",","Bill of Landing (B/L),Export Certificate,Export Certificate (Translate),Inspection Document");
}
function print2($array) {
     ?>
     <pre>
         <?php print_r($array); ?>
</pre>
     <?php 
}
function short_desc($html,$size=150) {
    $html = strip_tags($html);
    $html = substr($html,0,$size);
    $html = html_entity_decode($html);
    return $html . "...";
}
function status($y) {
    $status = array("Wait to Invoice","Non Approve","Approve");
    return $status[$y];
}
function status_color($y) {
    $color = array("danger","warning","success");
    return $color[$y];
}
function languages() {
    $diller = explode(",","en,ar,tr");
    return $diller;
}
function picture($f,$type="large") {
    $f =  str_replace("storage/app/files/","",$f);
    $file = $f;
    $f = url("cache/$type/".$f);
 
    return $f;
}
function picture2($f,$size,$storage=1) {
    if($storage==1) {
        $f = "storage/app/files/$f";
    }    
    $f = url("r.php?p=$f&w=$size");
    return $f;
}
function r($f,$size,$storage=1) {
    return picture2($f,$size,$storage);
}
function price($price,$type="$") {
    $price = str_replace(",","",$price);
    $price = str_replace(".","",$price);
    $price = str_replace("$","",$price);
    $price = str_replace(" ","",$price);
  //  echo $price;
    $price = @number_format($price, 2, ',', '.');
    return "$price $type";
}
function remaining_cost($inquiry_id) {
    $sorgu = db("payments")->select(DB::raw('SUM(fob) AS toplam'))->where("kid",$inquiry_id)->first();
    return $sorgu->toplam;
}
function clean_price($price) { //para tutar ifadelerindeki gereksiz yerleri temizler
    
    $price = str_replace(",","",$price);
    $price = str_replace(".","",$price);
    $price = str_replace("$","",$price);
    $price = str_replace("¥","",$price);
    $price = str_replace("€","",$price);
    $price = str_replace(" ","",$price);
  //  echo $price;
 //   $price = @number_format($price, 0, ',', '.');
    return (float) $price;
}


function price2($price,$type="¥") {
    //$price = str_replace(".","",$price);
    $price = @number_format($price, 0, ',', '.');
    return "$type $price";
}
function mile($mile,$type="KM") {
    $type = strtoupper($type);
    $mile = str_replace(".","",$mile);
    $mile = @number_format($mile, 0, ',', '.');
    return "$mile $type";
}

function stock_no() {
    $son = db("vehicles")->orderBY("id","desc")->first();
    $date = date("y");
    if($son) {

   
    $j = j($son->json);
    
    if(isset($j['stock_no'])) {
        $stock_no = $j['stock_no'];
        $stock_no = str_replace("HBS-","",$stock_no);
        $stock_no = substr($stock_no,2,strlen($stock_no));
      //  echo $stock_no;
        $stock_no++;
        $kalan = 7-strlen($stock_no);
        $zero ="";
        for($k=1;$k<$kalan;$k++) {
            $zero .=0;
        }
        $stock_no = "S".$date.$zero.$stock_no;
    } else {
        $stock_no = "S".$date."000001";
    }
    } else {
        $stock_no = "S".$date."000001";
    }
    return $stock_no;

}
function simdi() {
    return date("Y-m-d H:i:s");
}
function fob($price) {
    $fob = str_replace("$ ","",$price);
	$fob = str_replace(",","",$fob);
	return $fob;
}
function curr($type) {
    $kur = cfg3("currency-settings");
    return $kur[$type];
}

function cfg2($slug) {
    $c = db("contents")
    ->Where("kid","configuration-".$slug)
    ->get();
    $cikti = array();
    foreach($c AS $s) {
        array_push($cikti,$s);
    }
    return $cikti;
}
function cfg3($slug)
{

    $c = Contents::where("slug", $slug)->orWhere("type", $slug)->orderBy("id","DESC")->first();
    if($c) {
        $c = json_decode($c->json,true);
    } else {
        $c = array();
    }
    
    return $c;
}
function pic($pic,$type) {
    $pic = str_replace("storage/app/files/","",$pic); 
    return url("cache/$type/$pic");
}
function product($c) {
    //bu fonk. bir ürün blok tasarımını örnekler
     ?>
       <div class="card">
        <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" alt="Vans">
        <div class="card-img-overlay d-flex justify-content-end">
          <a href="#" class="card-link text-danger like">
            <i class="fas fa-heart"></i>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">{title}</h4>
          <h6 class="card-subtitle mb-2 text-muted">Style: VA33TXRJ5</h6>
          <p class="card-text">
            The Vans All-Weather MTE Collection features footwear and apparel designed to withstand the elements whilst still looking cool.             </p>
          <div class="options d-flex flex-fill">
             <select class="custom-select mr-1">
                <option selected>Color</option>
                <option value="1">Green</option>
                <option value="2">Blue</option>
                <option value="3">Red</option>
            </select>
            <select class="custom-select ml-1">
                <option selected>Size</option>
                <option value="1">41</option>
                <option value="2">42</option>
                <option value="3">43</option>
            </select>
          </div>
          <div class="buy d-flex justify-content-between align-items-center">
            <div class="price text-success"><h5 class="mt-4">$125</h5></div>
             <a href="#" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
          </div>
        </div>
      </div>
     <?php 
}
abstract class MessageType
{
    public const Success = 'success';
    public const Error = 'error';
}


function number($str)
{
    $str = str_replace(",", ".", $str);
    $str = floatval($str);
    return $str;
}

function map($title)
{
    $sorgu = db("contents")->where("kid", "configuration-planning-column-mapping")
        ->where("title", $title)
        ->first();
    if ($sorgu) {
        if ($sorgu->title2 != "") {
            return $sorgu->title2;
        } else {
            return $title;
        }
    } else {
        return $title;
    }

}

function is_json($string)
{
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
}

function whereJ($db, $col, $isaret, $val, $fonk = "")
{
    $db = $db->whereRaw("$fonk(JSON_UNQUOTE(json_extract(json, '$.\"$col\"'))) $isaret $val");
    return $db;
}

function orWhereJ($db, $col, $isaret, $val, $fonk = "")
{
    $db = $db->orWhereRaw("$fonk(JSON_UNQUOTE(json_extract(json, '$.\"$col\"'))) $isaret $val");
    return $db;
}

function chart($type, $col, $val)
{
    $id = rand(111, 999);
    ?>

    <canvas id="chart-area<?php echo $id ?>"></canvas>

    <script>


        var config<?php echo $id ?> = {
            type: '<?php echo $type ?>',
            data: {
                datasets: [{
                    data: [
                        <?php echo $val; ?>
                    ],
                    backgroundColor: [
                        window.chartColors.red,
                        window.chartColors.orange,
                        window.chartColors.yellow,
                        window.chartColors.green,
                        window.chartColors.blue,
                    ],
                    label: 'Dataset <?php echo $id ?>'
                }],
                labels: [
                    <?php echo $col; ?>
                ]
            },
            options: {
                responsive: false
            }
        };

        window.onload = function () {
            var ctx<?php echo $id ?> = document.getElementById('chart-area<?php echo $id ?>').getContext('2d');
            window.test<?php echo $id ?> = new Chart(ctx<?php echo $id ?>, config<?php echo $id ?>);
        };


    </script>

    <?php
}

function upload($file, $folder = "")
{
    $request = \Request::all();

    $ext = $request[$file]->getClientOriginalExtension();
    $name = $request[$file]->getClientOriginalName();
    $path = $request[$file]->storeAs("files/$folder", $name);
    return "storage/app/$path";
}

function varmi($dizi)
{
    if (count($dizi) > 0) {
        return true;
    } else {
        return false;
    }
}
function vehicles() {
    $s = db("vehicles");
    $s = $s->where("y","1");
    $s = $s->take(10);
    return $s;
}

function slugtotitle($slug)
{
    $slug = str_replace("-", " ", $slug);
    $slug = ucwords($slug);
    return $slug;
}

function seri()
{
    ?>
    <script type="text/javascript">
        $(function () {

            $(".seri").on("submit", function (e) {
                var buton = $(".seri button");
                var ajax_alan = $(this).attr("ajax");
                if (ajax_alan == undefined) {
                    ajax_alan = ".seri_ajax";
                }
                var yazi = buton.html();
                var data = $(this).serialize();
                buton.prop("disabled", "disabled");
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url: $(this).attr("action"),
                    type: "POST",
                    cache: false,
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,  // tell jQuery not to set contentType
                    data: formData,
                    success: function (d) {
                        buton.removeAttr("disabled");
                        $(ajax_alan).html(d);


                    }
                });
                return false;
            });
        });
    </script>
    <?php
}

function sf($id, $ajax = ".ajax", $html = "")
{
    $ajax = "$id $ajax";
    ?>
    <script type="text/javascript">
        $(function () {
            $("<?php echo $id ?>").on("submit", function () {
                var form = $("<?php echo $id ?>");
                var data = form.serialize();
                $(this).children("button").html("<?php e2("İşlem başarılı") ?>");
                $.ajax({
                    type: "POST",
                    url: form.attr("action"),
                    data: data,
                    dataType: "json",
                    success: function (data) {
                        <?php if($html == "") { ?>
                        $("<?php echo $ajax ?>").html(d);
                        <?php } else { ?>
                        $("<?php echo $ajax ?>").html("<?php echo($html) ?>");
                        <?php } ?>
                        $("<?php echo $id ?> button").html("<?php e2("İşlem başarılı") ?>");
                    }
                });
                return false;
            });
        });
    </script>
    <?php
}
 
function c($slug)
{
    $c = Contents::where("slug", $slug)->orWhere("id", $slug)->first();
    return $c;
}
function content($slug)
{
    $c = Contents::where("slug", $slug)->orWhere("id", $slug)->first();
    return $c;
}


function contents($type)
{
    return Contents::where("kid", $type)
        ->orWhere("type", $type)
//		->orWhere("title",$type)
        ->get();
}

function kd()
{
    return 0;
}


function user2() {
    global $_SESSION;
    oturumAc();
    if(oturumisset("uid")) {
        $u = (Array) db("users")->where("id",oturum("uid"))->first();
       // unset($u['id']);
        unset($u['password']);
        unset($u['password_hash']);
        unset($u['recover']);
        unset($u['remember_token']);
        unset($u['permissions']);
        unset($u['created_at']);
        unset($u['updated_at']);
        return $u;
    } else {
        return false;
    }
    
}
function users($level)
{
    return User::where("level", $level)->get();
}

function who($uid)
{
    return User::where("id", $uid)->first();
}

function ksorgu()
{
    return 0;
}

function e2($text)
{
    echo __($text);
}

function set($text)
{
    echo __($text);
}

function set_return($text)
{
    return __($text);
}

function u()
{   
    oturumAc();
    if(Auth::check()) {
        return Auth::user();
    } elseif(oturumisset("uid")) {
        $uid = db("users")->where("id",oturum("uid"))->first();
        
        return $uid;
    }
    
}
function u2($id)
{   
   
        $uid = db("users")->where("id",$id)->first();
        return $uid;
    
    
}

function settings_add($company_id,$key,$value) {
    return ekle(['company_id' => $company_id,'key' => $key,'value'=> $value],"settings");
}
function ekle($dizi, $tablo)
{
    oturumAc();
    //$dizi['created_at'] = date("Y-m-d H:i:s");
    return DB::table($tablo)->insertGetId($dizi);
}
function login() {
    oturumAc();
    global $_SESSION;
    if(oturumisset("uid")) {
        return true;
    } else {
        return false;
    }
}

function kripto($text) {
    return Hash::make($text);
}
function guncelle($dizi, $tablo = "contents")
{
    oturumAc();
    $dizi['updated_at'] = date("Y-m-d H:i:s");
    $dizi['uid'] = u()->id;
//	print_r($dizi);
    return DB::table($tablo)->update($dizi);
}

function dbFirst($tablo, $id)
{
    return $s = DB::table($tablo)->where("id", $id)->first();
}

function db($tablo)
{

    $s = DB::table($tablo);
    return $s;
}

function sorgu($tablo, $where = "", $order = "")
{
    $s = DB::table($tablo);
    if (strpos("%", $where) !== false) {
        $s = $s->where("json", "like", "$where");
    } else {
        if ($where != "") {
            $where = explode(",", $where);
            foreach ($where as $w) {
                $w2 = explode("=", $w);
                if (count($w2) > 1) {
                    $s = $s->whereJsonContains("json->" . $w2[0], $w2[1]);
                }
                $w2 = explode("%", $w);
                if (count($w2) > 1) {
                    $s = $s->where("json", "like", $w2[1]);
                }

            }
        }
    }
    if ($order != "") $s = $s->orderByRaw($order);
    $cache = array();
    $sorgu = $s->simplePaginate(15);
    $col = array();
    $row = array();
    $cache['col'] = array();
    $cache['row'] = array();
    $cache['links'] = "";
    if (count($sorgu) > 0) {

        foreach ($sorgu as $s) {
            $j = json_decode($s->json);
            $j->id = $s->id;
            $j->Create_Date = $s->created_at;
            unset($j->_token);
            array_push($cache, $j);
        }
        foreach ($cache as $a => $d) {
            array_push($row, $d);
        }
        foreach ($cache[0] as $a => $d) {
            array_push($col, str_replace("_", " ", $a));
        }
        $cache['col'] = $col;
        $cache['row'] = $row;
        $cache['row'] = array_filter($cache['row']);
        $cache['links'] = $sorgu->links();
        $cache['table'] = $tablo;
    }

    return $cache;
}

function dbJson($db, $tablo = "")
{ //db oluşturulmuş bir sorguyu json cache çıktısını verir.

    $cache = array();
    $sorgu = $db;
    $col = array();
    $row = array();
    $cache['col'] = array();
    $cache['row'] = array();
    $cache['links'] = "";
    if (count($sorgu) > 0) {

        foreach ($sorgu as $s) {
            $j = json_decode($s->json);
            $j->id = $s->id;
            $j->Create_Date = $s->created_at;
            unset($j->_token);
            array_push($cache, $j);
        }
        foreach ($cache as $a => $d) {
            array_push($row, $d);
        }
        foreach ($cache[0] as $a => $d) {
            array_push($col, str_replace("_", " ", $a));
        }
        $cache['col'] = $col;
        $cache['row'] = $row;
        $cache['row'] = array_filter($cache['row']);
        $cache['links'] = $sorgu->links();
        $cache['table'] = $tablo;
    }

    return $cache;
}


function bilgi($text)
{
    ?>
    <div class="alert alert-success"><?php echo __($text); ?></div>
    <?php
}

function showMessage($text, $message_type)
{
    switch ($message_type) {
        case MessageType::Success:
            ?>
            <div class="alert alert-success"><?php echo __($text); ?></div>
            <?php
            break;
        case MessageType::Error:
            ?>
            <div class="alert alert-danger"><?php echo __($text); ?></div>
            <?php
            break;
    }
}

function json_encode_tr($string)
{
    return json_encode($string, JSON_UNESCAPED_UNICODE);
}

function j($json, $true = true)
{
    return json_decode($json, $true);
}

function get($isim)
{
    if (isset($_GET[$isim])) {
        return $_GET[$isim];
    } else {
        return "";
    }
}

function yonlendir($url)
{
    header("Location: $url");
    exit();
}

function getisset($isim)
{
    if (isset($_GET[$isim])) {
        return 1;
    } else {
        return 0;
    }
}

function postEsit($post, $deger)
{
    $post = post($post);
    if ($post == $deger) {
        return 1;
    } else {
        return 0;
    }
}

function oturumEsit($oturum, $deger)
{
    $oturum = oturum($oturum);
    if ($oturum == $deger) {
        return 1;
    } else {
        return 0;
    }
}

function getEsit($get, $deger)
{
    $get = get($get);
    if ($get == $deger) {
        return 1;
    } else {
        return 0;
    }
}

function post($isim, $deger = "")
{
    if ($deger != "") {
        $_POST[$isim] = $deger;
    } else {
        if (isset($_POST[$isim])) {
            return @trim($_POST[$isim]);
        } else {
            return "";
        }
    }
}

function postisset($isim)
{
    if (isset($_POST[$isim])) {
        return 1;
    } else {
        return 0;
    }
}

function oturum($isim, $deger = "")
{
    oturumAc();
    if (isset($_SESSION[$isim])) {
        if ($deger == "") {
            return $_SESSION[$isim];
        } else {
            $_SESSION[$isim] = $deger;
            return $_SESSION[$isim];
        }
    } elseif ($deger != "") {
        $_SESSION[$isim] = $deger;
        return $_SESSION[$isim];

    }
}

function oturumisset($isim)
{
    oturumAc();
    if (isset($_SESSION[$isim])) {
        return 1;
    } else {
        return 0;
    }
}

function oturumAc($sonuc = "")
{
    if (!isset($_SESSION)) {
        @session_start();
        echo $sonuc;
    }
}

function diger_ayarlar()
{
    return explode(",", "users,languages,contents,new,fields,search,ALL PRIVILEGES");

}

function fields()
{
    $fields = Fields::get();
    $fields = json_decode($fields, true);
    $fields2 = array();
    foreach (@$fields as $r) {
        if (in_array($r['title'], $content_type)) {
            $fields2[$r['title']] = array(
                "values" => explode(",", $r['values']),
                "type" => $r['input_type']
            );
        }

    }
    $fields = $fields2;
    /*
        if(isset($ct->fields)) {
            $content_fields = explode(",",$ct->fields); // içerik alanları
        }
    */
    return $fields;
}

function json_field($json, $field)
{ //bir json içinde girilmiş alanı bulur bu aslında post ederken boşluk içeren alanlarda otomatik oluşan _ karakteri sorunundan dolayı üretildi
    return @$json[str_replace(" ", "_", $field)];

}

function validBase64($string)
{
    $decoded = base64_decode($string, true);

    // Check if there is no invalid character in string
    if (!preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $string)) return false;

    // Decode the string in strict mode and send the response
    if (!base64_decode($string, true)) return false;

    // Encode and compare it to original one
    if (base64_encode($decoded) != $string) return false;

    return true;
}

function isJSON($string)
{
    return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
}

function getLangFile($lang)
{
    $path = "resources/lang/$lang" . ".json";
    if (file_exists($path)) {
        return file_get_contents($path);
    } else {
        $json = json_encode(array());
        file_put_contents($path, $json);
        return file_get_contents($path);
    }
}

function putLangFile($lang, $json)
{
    if (isJSON($json)) {
        return file_put_contents("resources/lang/$lang" . ".json", $json);
    } else {
        return null;
    }
}

function is_html($string)
{
    return preg_match("/<[^<]+>/", $string, $m) != 0;
}

function readYPTABFile($yptab_file_name)
{

    Log::debug("Start parsing the file $yptab_file_name");

    $file_content = file_get_contents($yptab_file_name);
    $file_content_rows = explode("\n", $file_content);

    $row_index = 0;

    $sap_planning = array();
    $columns_name = array();

    // read give file rows
    foreach ($file_content_rows as $file_content_row) {

        $file_content_row_columns = explode("|", $file_content_row);

        $sap_planning['row'][$row_index] = array();
        if ($row_index == 0) {
            // the first row is columns name
            $sap_planning['col'] = array();
            $column_index = 0;

            array_push($sap_planning['col'], "ID");
            array_push($sap_planning['col'], "Color");

            foreach ($file_content_row_columns as $column_title) {
                array_push($sap_planning['col'], $column_title);
                $columns_name[$column_title] = $column_index;
                $column_index++;
            }
        } else {
            $x = 0;
            @$sap_planning['row'][$row_index][$sap_planning['col'][$x]] = $file_content_row_columns[8];//date("His").rand(11111,99999);
            @$sap_planning['row'][$row_index][$sap_planning['col'][$x + 1]] = "hsla(" . rand(100, 360) . "," . rand(0, 100) . "%," . rand(10, 100) . "%,0.3)";

            // iterate over columns to complete the row
            foreach ($file_content_row_columns as $column_content) {
                @$sap_planning['row'][$row_index][$sap_planning['col'][$x + 2]] = trim($column_content);
                $x++;
            }
        }

        $row_index++;
    }
    $sap_planning['row'] = array_filter($sap_planning['row']);
    $sap_panning['map'] = $columns_name;

    Log::debug("Finish parsing the file $yptab_file_name");

    return $sap_planning;
}

function readYPLABFile($yptab_file_name)
{

    Log::debug("Start parsing the file $yptab_file_name");

    $file_content = file_get_contents($yptab_file_name);
    $file_content_rows = explode("\n", $file_content);

    $row_index = 0;

    $sap_planning = array();
    $columns_name = array();

    // read give file rows
    foreach ($file_content_rows as $file_content_row) {

        $file_content_row_columns = explode("|", $file_content_row);

        $sap_planning['row'][$row_index] = array();
        if ($row_index == 0) {
            // the first row is columns name
            $sap_planning['col'] = array();
            $column_index = 0;

            array_push($sap_planning['col'], "ID");
            array_push($sap_planning['col'], "Color");

            foreach ($file_content_row_columns as $column_title) {
                array_push($sap_planning['col'], $column_title);
                $columns_name[$column_title] = $column_index;
                $column_index++;
            }
        } else {
            $x = 0;
            @$sap_planning['row'][$row_index][$sap_planning['col'][$x]] = $file_content_row_columns[8];//date("His").rand(11111,99999);
            @$sap_planning['row'][$row_index][$sap_planning['col'][$x + 1]] = "hsla(" . rand(100, 360) . "," . rand(0, 100) . "%," . rand(10, 100) . "%,0.3)";

            // iterate over columns to complete the row
            foreach ($file_content_row_columns as $column_content) {
                @$sap_planning['row'][$row_index][$sap_planning['col'][$x + 2]] = trim($column_content);
                $x++;
            }
        }

        $row_index++;
    }
    $sap_planning['row'] = array_filter($sap_planning['row']);
    $sap_panning['map'] = $columns_name;

    Log::debug("Finish parsing the file $yptab_file_name");

    return $sap_planning;
}

function readYPROFile($ypro_file_name)
{

    Log::debug("Start parsing the file $ypro_file_name");

    $file_content = file_get_contents($ypro_file_name);
    $file_content_rows = explode("\n", $file_content);

    $row_index = 0;

    $sap = array();
    $columns_name = array();

    // read give file rows
    foreach ($file_content_rows as $file_content_row) {

        $file_content_row_columns = explode(";", $file_content_row);

        $sap['row'][$row_index] = array();
        if ($row_index == 0) {
            // the first row is columns name
            $sap['col'] = array();
            $column_index = 0;
            foreach ($file_content_row_columns as $column_title) {
                array_push($sap['col'], $column_title);
                $columns_name[$column_title] = $column_index;
                $column_index++;
            }
        } else {
            // iterate over columns to complete the row
            foreach ($file_content_row_columns as $column_content) {
                if (is_float($column_content)) {
                    array_push($sap['row'][$row_index], eval($column_content));
                } else {
                    array_push($sap['row'][$row_index], ($column_content));
                }
            }
        }

        $row_index++;
    }
    $sap['map'] = $columns_name;

    Log::debug("Finish parsing the file $ypro_file_name");

    return $sap;
}

/**
 *
 *
 * @param $qty_diff int how many item should be added to the board
 * @param $qty_of_each_card int quantity of each card
 * @param $last_card any last card of process id
 * @param $total_shaped int how many items are already shaped
 * @param $planning_board any the whole board
 */
function pushNewCards($qty_diff, $qty_of_each_card, $last_card, $total_shaped, $planning_board)
{
    // There is not any new card
    if (empty($qty_diff) || empty($last_card) || empty($last_card['html'])) {
        return;
    }

    $changed_items = array();

    $last_card = getCardById($last_card['id'], $planning_board);
    // Fill the latest card if it has capacity
    if (isset($last_card->place_holder['qty']) &&
        $last_card->place_holder['qty'] < $qty_of_each_card) {
        if ($qty_diff < ($qty_of_each_card - $last_card->place_holder['qty'])) {
            $last_card->place_holder['qty'] += $qty_diff;
            $total_shaped -= $qty_diff;
            $qty_diff = 0;
        } else {
            $qty_diff -= ($qty_of_each_card - $last_card->place_holder['qty']);
            $total_shaped -= ($qty_of_each_card - $last_card->place_holder['qty']);
            $last_card->place_holder['qty'] = $qty_of_each_card;
        }
        $last_card->place_holder['html'] = Card::generateHtml(
            $last_card->place_holder['jid'],
            $last_card->place_holder['qty'],
            str_replace(Card::PART_TITLE, "", $last_card->place_holder['number']),
            $total_shaped >= $last_card->place_holder['qty'] ?
                100 : round(100 * $total_shaped / $last_card->place_holder['qty'], 0),
            $last_card->place_holder['html']
        );

    }
    if (!isset($changed_items[$last_card->place_holder['date']])) {
        $changed_items[$last_card->place_holder['date']] = array();
    }
    array_push(
        $changed_items[$last_card->place_holder['date']],
        $last_card
    );
    $planning_board = updatePlanningBoard($planning_board, $changed_items, false);

    $card_number = (int)str_replace("Part ", "", $last_card->place_holder['number']);
    $jid = $last_card->place_holder['jid']; // use the same jid of latest card
    // clear any progress
    $html_template = str_replace(' checked3="checked"><div class="json d-none">', '><div class="json d-none">', $last_card->place_holder['html']);
    $html_template = preg_replace('/job(.*) fill halfcheck(.*)- /m', 'job fill', $html_template);

    // Loop over current workstation in the board to find the first empty or not finished place holder
    $next_place_holder = getCardById(
        nextCardId($last_card->place_holder),
        $planning_board
    );
    while (!empty($next_place_holder->place_holder['html']) &&
        (strpos($next_place_holder->place_holder['html'], ' checked3="checked"') ||
            strpos($next_place_holder->place_holder['html'], ' job fill halfcheck'))
    ) {
        $next_card_id = nextCardId($next_place_holder->place_holder);
        $next_place_holder = getCardById(
            $next_card_id,
            $planning_board);
    }


    // if there is not any place holder to fill
    if (empty($next_place_holder)) {
        //TODO: throw exception
        Log::error("There is not any card to push the new cards");
        return;
    }

    $current_place_holder = new Card(
        isset($next_place_holder->place_holder['jid']) ? $next_place_holder->place_holder['jid'] : "",
        $next_place_holder->place_holder['id'],
        $next_place_holder->place_holder['html'],
        $next_place_holder->place_holder['date'],
        "",
        $next_place_holder->place_holder['number'],
        $next_place_holder->place_holder['qty'],
        $next_place_holder->place_holder['workstation'],
        $next_place_holder->index_per_day
    );
    for (; $qty_diff > 0;) {
        // keep current content of the place holder
        if (isset($current_place_holder->jid)) {
            $moving_card_jid = $current_place_holder->jid;
        }
        $moving_card_html = $current_place_holder->html;
        $moving_card_qty = $current_place_holder->qty;
        $moving_card_number = $current_place_holder->number;

        // fill the place holder with new content
        $card_number++;
        if ($qty_diff < $qty_of_each_card) {
            $qty = $qty_diff;
            $qty_diff = 0;
        } else {
            $qty_diff -= $qty_of_each_card;
            $qty = $qty_of_each_card;
        }
        $current_place_holder->jid = $jid;
        $current_place_holder->html = Card::generateHtml(
            $jid,
            $qty,
            $card_number,
            $total_shaped >= $qty ?
                100 : round(100 * $total_shaped / $qty, 0),
            $html_template
        );
        $current_place_holder->qty = $qty;
        $current_place_holder->number = Card::PART_TITLE . " " . $card_number;
        $total_shaped -= $qty;

        // Save changes into the in-memory board
        list($changed_items, $planning_board) = saveCard(
            $changed_items,
            (object)['place_holder' => (array)$current_place_holder, 'index_per_day' => $current_place_holder->index_per_day],
            $planning_board,
            false
        );

        $next_card = (object)['place_holder' => (array)$current_place_holder];
        // push next cards forward if needed
        while (!empty($moving_card_html)) {

            // Get the next card to continue
            $next_card = getCardById(
                nextCardId($next_card->place_holder),
                $planning_board
            );

            // End of board
            if (empty($next_card)) {
                break;
            }

            // exchange contents
            $temp_place_holder = new Card(
                isset($next_card->place_holder['jid']) ? $next_card->place_holder['jid'] : "",
                $next_card->place_holder['id'],
                $next_card->place_holder['html'],
                $next_card->place_holder['date'],
                "",
                $next_card->place_holder['number'],
                $next_card->place_holder['qty'],
                $next_card->place_holder['workstation'],
                $next_card->index_per_day
            );
            fillCard($next_card, $moving_card_jid, $moving_card_html, $moving_card_qty, $moving_card_number);
            list($changed_items, $planning_board) = saveCard($changed_items, $next_card, $planning_board, false);

            if (isset($temp_place_holder->jid)) {
                $moving_card_jid = $temp_place_holder->jid;
            }
            $moving_card_html = $temp_place_holder->html;
            $moving_card_qty = $temp_place_holder->qty;
            $moving_card_number = $temp_place_holder->number;

        }

        // Get next place_holder to fetch any changes
        $next_moving_card = getCardById(
            nextCardId((array)$current_place_holder),
            $planning_board
        );
        $current_place_holder = new Card(
            isset($next_moving_card->place_holder['jid']) ? $next_moving_card->place_holder['jid'] : "",
            $next_moving_card->place_holder['id'],
            $next_moving_card->place_holder['html'],
            $next_moving_card->place_holder['date'],
            "",
            $next_moving_card->place_holder['number'],
            $next_moving_card->place_holder['qty'],
            $next_moving_card->place_holder['workstation'],
            $next_moving_card->index_per_day
        );

    }

    updatePlanningBoard($planning_board, $changed_items, true);
}

/**
 * @param array $changed_items
 * @param $card
 * @param $planning_board
 * @param $persist_planning_board
 * @return array
 */
function saveCard(array $changed_items, $card, $planning_board, $persist_planning_board): array
{
    if (!isset($changed_items[$card->place_holder['date']])) {
        $changed_items[$card->place_holder['date']] = array();
    }
    array_push(
        $changed_items[$card->place_holder['date']],
        $card
    );
    $planning_board = updatePlanningBoard($planning_board, $changed_items, $persist_planning_board);
    return array($changed_items, $planning_board);
}

/**
 * @param $new_jid
 * @param $card
 * @param $new_html
 * @param $new_qty
 * @param $new_number
 */
function fillCard($card, $new_jid, $new_html, $new_qty, $new_number): void
{
    if (isset($new_jid)) {
        $card->place_holder['jid'] = $new_jid;
    }
    $card->place_holder['html'] = $new_html;
    $card->place_holder['qty'] = $new_qty;
    $card->place_holder['number'] = $new_number;
}

/**
 *
 * @param $qty_diff int number of item that should be removed
 * @param process_id_cards the chain of process cards
 * @param $planning_board array whole board
 */
function popPreviousCards($qty_diff, $process_id_cards, $planning_board)
{
    // There is not any item to remove
    if (empty($qty_diff) || empty($process_id_cards)) {
        return;
    }

    $changed_items = array();

    // try to decrease cards from last
    for ($i = count($process_id_cards) - 1; $i >= 0 && $qty_diff > 0; $i--) {

        $latest_place_holder = $process_id_cards[$i];

        $current_place_holder = getCardById(
            $latest_place_holder['id'],
            $planning_board
        );

        if (strpos($current_place_holder->place_holder['html'], ' checked3="checked"') ||
            strpos($current_place_holder->place_holder['html'], ' job fill halfcheck')) {
            // could not decrease already shaped card
            return;
        }

        $place_holder_qty = $current_place_holder->place_holder['qty'];
        $current_place_holder->place_holder['qty'] -= $qty_diff;

        if ($current_place_holder->place_holder['qty'] <= 0) {
            // The card should be removed
            $qty_diff -= $place_holder_qty;

            $next_moving_card = getCardById(
                nextCardId($current_place_holder->place_holder),
                $planning_board
            );

            // pop the current place holder
            while (!empty($next_moving_card)) {

                if (isset($next_moving_card->place_holder['jid'])) {
                    $current_place_holder->place_holder['jid'] = $next_moving_card->place_holder['jid'];
                } else if (isset($current_place_holder->place_holder['jid'])) {
                    unset($current_place_holder->place_holder['jid']);
                }
                $current_place_holder->place_holder['html'] = $next_moving_card->place_holder['html'];
                $current_place_holder->place_holder['qty'] = $next_moving_card->place_holder['qty'];
                $current_place_holder->place_holder['number'] = $next_moving_card->place_holder['number'];

                list($changed_items, $planning_board) = saveCard($changed_items, $current_place_holder, $planning_board, false);

                $current_place_holder = $next_moving_card;
                if (!isset($current_place_holder) || empty($current_place_holder->place_holder['html'])) {
                    break;
                }

                $next_moving_card = getCardById(
                    nextCardId($next_moving_card->place_holder),
                    $planning_board
                );

            }

        } else {

            $percentage = 0;
            if (strpos(' checked3="checked"><div class="json d-none">', $current_place_holder->place_holder['html'])) {
                $percentage = 100;
            } else if (preg_match('/job fill halfcheck-([0-9]+)-.*/', $current_place_holder->place_holder['html'], $percentage_matches)) {
                $previous_percentage = $percentage_matches[1];
                if (preg_match('/title="([0-9]+).*/', $current_place_holder->place_holder['html'], $qty_matches)) {
                    $previous_qty = $qty_matches[1];
                    $percentage = ($previous_percentage * $current_place_holder->place_holder['qty']) / $previous_qty;
                    $percentage = $percentage > 1 ? 100 : $percentage * 100;
                }
            }
            $current_place_holder->place_holder['html'] = Card::generateHtml(
                $current_place_holder->place_holder['jid'],
                $current_place_holder->place_holder['qty'],
                str_replace(Card::PART_TITLE, "", $current_place_holder->place_holder['number']),
                $percentage,
                $current_place_holder->place_holder['html']
            );

            // The card should be remained
            list($changed_items, $planning_board) = saveCard($changed_items, $current_place_holder, $planning_board, false);
            break;
        }
    }

    updatePlanningBoard($planning_board, $changed_items, true);
}

/**
 * @param $planning_board
 * @param array $changed_items
 */
function updatePlanningBoard($planning_board, array $changed_items, $persist_planning_board)
{

    // If there is not any item to save
    if (empty($changed_items)) {
        return $planning_board;
    }

    // loop over all board per day
    foreach ($planning_board as $planning_board_day) {

        // if there is any change in this date
        if (isset($changed_items[$planning_board_day->date])) {
            $planning_board_day_place_holder_list = json_decode($planning_board_day->json, true);

            // loop over all changes in this date
            foreach ($changed_items[$planning_board_day->date] as $changed_place_holder) {

                // update the corresponding place holder
                $place_holder = &$planning_board_day_place_holder_list[$changed_place_holder->index_per_day];
                if (isset($changed_place_holder->place_holder['jid'])) {
                    $place_holder['jid'] = $changed_place_holder->place_holder['jid'];
                } else if (isset($place_holder['jid'])) {
                    unset($place_holder['jid']);
                }
                $place_holder['html'] = $changed_place_holder->place_holder['html'];
                $place_holder['qty'] = $changed_place_holder->place_holder['qty'];
                $place_holder['number'] = $changed_place_holder->place_holder['number'];

            }

            $json = json_encode_tr($planning_board_day_place_holder_list);
            $planning_board_day->json = $json;
            if ($persist_planning_board) {
                db("planning-board")
                    ->where("id", $planning_board_day->id)
                    ->update([
                        "json" => $json
                    ]);
            }
        }
    }

    return $planning_board;
}

function nextCardId($current_card)
{
    $new_card_date = $current_card['date'];
    $new_card_workstation = $current_card['workstation'];
    $new_card_shift_name =
        str_replace(
            "-",
            "",
            str_replace(
                $new_card_date,
                "",
                str_replace(
                    strtolower($current_card['workstation']),
                    "",
                    $current_card['id']
                )
            )
        );
    switch ($new_card_shift_name) {
        case "f":
            $new_card_shift_name = "f2";
            break;
        case "f2":
            $new_card_shift_name = "m";
            break;
        case "m":
            $new_card_shift_name = "m2";
            break;
        case "m2":
            $new_card_shift_name = "n";
            break;
        case "n":
            $new_card_shift_name = "n2";
            break;
        case "n2":
            $new_card_shift_name = "f";
            $new_card_date = date('Y-m-d', strtotime('+1 day', strtotime($new_card_date)));
            break;
    }
    return strtolower($new_card_workstation) . "-" . $new_card_date . "-" . $new_card_shift_name;
}

function getCardById($card_id, $planning_board)
{
    $index = 0;
    foreach ($planning_board as $planning_board_day) {
        $index_per_day = 0;
        $planning_board_day_place_holder_list = json_decode($planning_board_day->json, true);
        foreach ($planning_board_day_place_holder_list as $planning_board_day_place_holder) {
            if ($planning_board_day_place_holder['id'] == $card_id) {
                return (object)[
                    "index" => $index,
                    "id" => $planning_board_day->id,
                    "place_holder" => $planning_board_day_place_holder,
                    "index_per_day" => $index_per_day
                ];
            }
            $index_per_day++;
        }
        $index++;
    }
    return null;
}
