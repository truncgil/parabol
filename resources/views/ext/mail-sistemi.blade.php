@extends('layouts.admin')
@section('title', "Mail Sistemi")
@section('content')

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
         <form action="/{{company_id()}}/ext/mail-sistemi?gonder" method="post">
                @csrf
                Mailler: 
                <textarea name="mails" id="" cols="30" rows="10" class="form-control">{{implode("\n",$mails)}}</textarea>
                Mail Başlığı:
                <input type="text" name="subject" id="" class="form-control">
                Mail İçeriği:
                <textarea name="html" id="editor1" cols="30" rows="10" class="form-control"></textarea>
                <button class="btn btn-primary mt-4">Gönder</button>
         </form>
     </div>
 </div> 
 <?php } ?>

@endsection