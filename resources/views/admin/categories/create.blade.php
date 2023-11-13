@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Crear Categoría</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif
<div class="card text-left">
  <div class="card-body">
    {!! Form::open(['route'=> 'admin.categories.store']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre de la categoría']) !!}
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
            @error('slug')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        {{-- <div class="form-group">
            {!! Form::label('slug', 'Slug') !!}
            {!! Form::text('slug', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el slug de la categoría']) !!}
        </div> --}}
        {!! Form::submit('Crear categoría', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
  </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
