@extends('adminlte::page')

@section('title', 'Post')

@section('content_header')
    <h1>Actualizar Post</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif
<div class="card text-left">
  <div class="card-body">
    {!! Form::model($post, ['route'=> ['admin.posts.update',$post], 'method' => 'put', 'autocomplete' => 'off', 'files' => true]) !!}
        {!! Form::hidden('user_id', auth()->user()->id) !!}
        @include('admin.posts.partials.form')
        {!! Form::submit('Actualizar Post', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
</div>

@stop

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
