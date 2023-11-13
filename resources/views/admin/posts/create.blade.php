@extends('adminlte::page')

@section('title', 'Posts')

@section('content_header')
    <h1>Crear Post</h1>
@stop
@php
$configEditor = [
    "height" => "100",
    "toolbar" => [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
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
    {!! Form::open(['route'=> 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}
        @include('admin.posts.partials.form')
        {!! Form::submit('Crear Post', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
</div>
@stop
{{-- @section('plugins.Summernote', true) --}}
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
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script defer>
    ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
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
