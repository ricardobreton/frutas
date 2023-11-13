@extends('adminlte::page')
@section('title', 'error 403')

@section('content')
    <div class="h1 text-danger text-center">
        Acceso no autorizado!!!
    </div>
    <div style="display: flex;">
        <img class="logo-center" style="width: 50%; height: 50%; margin: 1em auto;" src="{{asset('img/candado.png')}}" alt="Perminiso no Autorizado">
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop