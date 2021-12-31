
@extends('layouts.admin')
@section('title', "Kullanıcı Listesi")
@section('content')
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
            <img src="{{url("public/img/parabol.svg")}}" style="width:300px;" class="img-fluid" alt="">
            <h1 style="font-size:80px;">{{$db->count()}}</h1>
            <p style="font-size:30px;">Kullanıcı sayısına ulaştık!</p>
</div>
</div>
@endsection