@extends('adminlte::page')

@section('title', 'Seccion Alcaldia')

@section('content_header')
    <h1>Editar Seccion de la alcaldia de {{$alcaldia->nombre}}</h1>
@stop
@php
$configEditor = [
    "height" => "300px",
    "toolbar" => [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link']],//, 'picture', 'video'
        ['view', ['fullscreen', 'codeview', 'help']],
    ],
]
@endphp
@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif
<div class="card text-left">
  <div class="card-body">
    {!! Form::open(['route'=> ['admin.alcaldia.secciones.update', $seccion->id], 'method' => 'PUT', 'autocomplete' => 'off', 'files' => true]) !!}
    {!! Form::hidden('alcaldia_id', $seccion->alcaldia_id) !!}
        @include('admin.alcaldias.seccion.partials.form')
        {!! Form::submit('Actualizar Sección', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
</div>
@stop
@section('plugins.Summernote', true)
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script> --}}
<script defer>
    // CKEDITOR.config.width = 1000; //ancho (px,%,em)
    // CKEDITOR.config.height = 200; //alto (px,%,em)
    // ClassicEditor
    //     .create( document.querySelector( '#extract' ) )
    //     .catch( error => {
    //         console.error( error );
    //     } );
    //     ClassicEditor
    //     .create( document.querySelector( '#body' ) )
    //     .catch( error => {
    //         console.error( error );
    //     } );
    document.getElementById('file').addEventListener('change', cambiarImagen);
    function cambiarImagen(event) {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function(e){
            document.getElementById("picture").setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(file);
    }
</script>

@stop
