@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Actualizar Categorías</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif
<div class="card text-left">
    <div class="card-body">
      {!! Form::model($category, ['route'=> ['admin.categories.update',$category], 'method' => 'put']) !!}

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
          <div class="form-group">
              {!! Form::label('slug', 'Slug') !!}
              <span class="form-control">{{$category->slug}}</span>
          </div>
          {!! Form::submit('Actualizar categoría', ['class' => 'btn btn-primary']) !!}

      {!! Form::close() !!}
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
