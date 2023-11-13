@extends('adminlte::page')

@section('title', 'Panel control cliente')

@section('content_header')
<h1>Panel de Control Cliente</h1>
@stop

@section('content')

<div class="row">
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{Auth::user()->name}}</h3>

                <p>Perfil</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <a href="{{route('user.profile')}}" class="small-box-footer">Ver Perfil <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{Auth::user()->persona->mascotas()->count()}}</h3>

                <p>Mascotas</p>
            </div>
            <div class="icon">
                <i class="fas fa-paw"></i>
            </div>
            <a href="{{route('mascota.index')}}" class="small-box-footer">Ver Mascotas <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('/css/admin_custom.css')}}">
@stop

@section('js')
<script>
    console.log('Hi!');

</script>
@stop
