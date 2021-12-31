
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
    <div class="card-body">
<h1>{{$db->count()}}</h1>
<div class="table-responsive">
    <table class="table">
        <tr>
            <td>Sıra</td>
            <td>Company ID</td>
            <td>İsim</td>
            <td>E-Mail</td>
            <td>Üyelik Tarihi</td>
            <td>Son Giriş Tarihi</td> 
        </tr>
        <?php 
        $k=0;
        foreach($db AS $u) { $k++; ?>
        <tr  <?php if($u->first_date!=$u->last_logged_in_at) { ?>data-class="used"<?php } ?>">
            <td>{{$k}}</td>
            <td>{{$u->id}}</td>
            <td>{{$u->name}}</td>
            <td>{{$u->email}}</td>
            <td>{{date("d.m.Y H:i",strtotime($u->first_date))}}</td>
            <td>{{date("d.m.Y H:i",strtotime($u->last_logged_in_at))}}</td>
        </tr>
        <?php } ?>
    </table>    
    </div>
</div>
</div>
<script>
    $(function(){
        window.setTimeout(function(){
            $("[data-class='used']").addClass("table-success");
        },500);
    });
</script>
<style>
    .used td {
        background:green !important;
    }
</style>
@endsection