

@extends('layouts.admin')
@section('title', "Duyurular ve Yenilikler")
@section('content')
<?php $cid = company_id(); ?>
<?php $url = "$cid/ext/duyurular"; ?>
<div class="card">
    <div class="card-body">
        <p>Parabol'ü sizinle beraber en hızlı şekilde geliştirmeye devam ediyoruz. Gelecek ve gelmekte olan yeniliklerimizi bu sayfadan takip edebilirsiniz.</p>
        <div class="card-content">
            <?php if($cid==1) {
                if(getisset("sil")) {
                    db("duyurular")->where("id",get("sil"))
                    ->delete();
                    bilgi("Silme işlemi başarılı");
                }
                if(getisset("ekle")) {
                    ekle([
                        "aciklama" =>post("aciklama"),
                        "date" => post("date")
                    ],"duyurular");
                    bilgi("Ekleme işlemi başarılı");
                }
                 ?>
                 <form action="{{$url}}?ekle" method="post">
                     {{csrf_field()}}
                     Açıklama:
                    <textarea name="aciklama" id="" cols="30" rows="10" class="form-control"></textarea>
                    Tarih:
                    <input type="date" name="date" id="" value="{{date("Y-m-d")}}" class="form-control">
                    <button class="btn btn-primary">Ekle</button>

                 </form>
                 <?php 
            } ?>
            
               
                <ul class="list-group">
                    <?php $duyurular = db("duyurular")->orderBy("date","DESC")->get(); foreach($duyurular AS $d)  { 
  ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{$d->aciklama}}
                       
                                <span class="badge badge-primary badge-pill">{{date("d.m.Y",strtotime($d->date))}}</span>
                                
                                    
                                    <?php if($cid==1)  { 
                          ?>
                                    <a href="{{$url}}?sil={{$d->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <?php } ?>
                              
                               
                              
                        
                      

                    </li>
                    <?php } ?>

                </ul>
   
        </div>

    </div>
</div>
<style>
  
</style>

@endsection