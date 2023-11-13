@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1>Edición de usuarios</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Editar Usuario del Sistema</h3>
    </div>
    <!-- /.card-header -->
    @include('partes.alertas')
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{ route('admin.user.update', [$usuario])}}" enctype="multipart/form-data">
        @csrf @method('PATCH')
        <div class="card-body">
            <div class="mb-2">
                <span class="{{$usuario->activo?'text-success':'text-danger'}} ">Usuario {{ $usuario->activo ?'Habilitado':'Eliminado' }}</span>
            </div>
            @include('admin.usuario.formulario-2')
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            @include('partes.btn-guardar-right')
        </div>
        <!-- /.card-footer -->
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('/css/admin_custom.css')}}">
@stop

@section('js')
    <script>
        function mostrar(){
            console.log('mostrar activo');
        var archivo = document.getElementById("customFile").files[0];
        console.log(archivo);
        var reader = new FileReader();
        if (archivo) {
            reader.readAsDataURL(archivo );
            reader.onloadend = function () {
            document.getElementById("img-avatar").src = reader.result;
            }
        }
        }
        $('.custom-file-input').on('change', function(event) {
            var inputFile = event.currentTarget;
            $(inputFile).parent()
                .find('.custom-file-label')
                .html(inputFile.files[0].name);
        });
    </script>
@stop

