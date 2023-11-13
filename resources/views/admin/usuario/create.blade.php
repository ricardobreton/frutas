@extends('adminlte::page')

@section('title', 'Crear Usuario')

@section('content_header')
    <h1>Nuevo Usuario</h1>
@stop
@section('content')
    <div class="card card-warning card-outline">
    <div class="card-header">
        <h3 class="card-title text-muted">Crear Nuevo Usuario del Sistema</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{ route('admin.user.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
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