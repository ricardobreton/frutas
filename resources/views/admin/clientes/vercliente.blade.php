@extends('adminlte::page')

@section('title', 'Ver Cliente')

@section('content_header')
<h1>Ver datos cliente</h1>
@stop

@section('content')
<div class="row">
    <div class="col-sm-6 col-md-5">
        <div class="">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{asset('storage/avatar/'.$cliente->usuario->avatar)}}"
                            alt="User profile picture">
                    </div>
                    <p>
                    </p>
                    <h3 class="profile-username text-center">{{$cliente->full_name}}</h3>
                    <address class="text-muted">
                        <strong>Datos</strong><br>
                        CI: {{$cliente->ci_nit}}<br>
                        Correo: {{$cliente->usuario->email}}<br>
                        Teléfono: {{$cliente->telefonos}}<br>
                        Dirección: {{$cliente->direccion}}<br>
                    </address>
                    <br>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <div class="col-sm-6 col-md-7 p-0">
        <div class="card card-warning card-outline">
            <div class="card-body box-profile">
                <div class="row m-0">
                    <ul class="users-list clearfix">
                    @foreach ($mascotas as $mascota)
                        <li>
                            <img class="profile-user-img img-fluid" src="{{asset('storage/mascotas/'.$mascota->foto)}}" alt="Foto mascota">
                            <a class="users-list-name" href="#">{{$mascota->nombres}}</a>
                            <span class="users-list-date">Edad {{$mascota->fecha_nac->age}}</span>
                            <span class="small">{{$mascota->descripcion}}</span>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('/css/admin_custom.css')}}">
@stop

@section('js')
<script>
</script>
@stop
