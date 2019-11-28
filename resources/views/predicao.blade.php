@extends('adminlte::page')

@section('title', 'Predição')


@section('content')

<div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
        <span class="info-box-icon bg-info"><i class="far fa-videocam"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Adicionar Camera </span>
         </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>



@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop