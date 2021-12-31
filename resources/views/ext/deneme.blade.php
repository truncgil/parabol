@extends('layouts.admin')
@section('title', "test")
@section('content')

<div class="card">
    <div class="card-body">
<?php echo mailsend("umitreva@gmail.com","deneme","12345") ?>
</div>
</div>

@endsection