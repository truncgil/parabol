@extends('layouts.admin')

@section('title', trans('revenues.revenue_received'))

@section('new_button')
    <x-transactions.show.top-buttons type="income" :transaction="$revenue" />
@endsection

@section('content')
    <x-transactions.show.content type="income" :transaction="$revenue" />
@endsection

@push('scripts_start')
    <link rel="stylesheet" href="{{ asset('public/css/print.css?v=' . version('short')) }}" type="text/css">

    <x-transactions.script type="income" />
    <script>
        $(function(){
            $(".action-delete").on("click",function(){
                
                $.ajax({
                    method : "DELETE",
                    data : {
                        _token : "{{csrf_token()}}"
                    },
                    url : "<?php echo $_SERVER['SCRIPT_URI'] ?>",
                    success:function(d){
                       location.href = d.redirect;
                    }

                });
                
               
            });
        });
    </script>
@endpush
