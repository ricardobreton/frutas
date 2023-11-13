@extends('adminlte::page')

@section('title', 'Mascotas')

@section('content_header')
<h1>Gestión de Mascotas</h1>
@stop

@section('content')
<div class="col-md-12">
    @include('partes.alertas')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de mascotas</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {{-- @can('admin.user.create') --}}
            <a class="btn btn-sm btn-primary mb-3" href="{!! route('mascota.create') !!}">
                Nuevo
            </a>
            {{-- @endcan --}}
            <div class="row">
                @foreach ($mascotas as $mascota)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        Mascota
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead"><b>{{ $mascota->nombres }}</b></h2>
                                <p class="text-muted text-sm"><b>Edad: </b> {{ $mascota->fecha_nac->age }} años </p>
                                <p class="text-muted text-sm"><b>Sexo: </b> {{ $mascota->sexo }} </p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small"><span class="fa-li"><i class="far fa-heart"></i></span>
                                        {{ $mascota->descripcion }}</li>
                                </ul>
                            </div>
                            <div class="col-5 text-center">
                                @php
                                    $image_url = "https://www.proanisrl.com/img/mascotas/default.png";
                                    if (isset($mascota)) {
                                        $image_url = asset(Storage::url($mascota->foto));
                                    }
                                @endphp
                                <img src="{{$image_url}}" alt="user-avatar"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <div class="btn-group">
                                <a class="btn btn-sm btn-info" href="{!! route('mascota.edit', [$mascota->id]) !!}">
                                    <i class="far fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('mascota.destroy', [$mascota->id]) }}" method="POST"
                                    onsubmit='return confirm("Los datos borrados no se podran recuperar, ¿Desea continuar?");'>
                                    @csrf @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                            class="far fa-trash-alt"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        </div>
    </div>
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
