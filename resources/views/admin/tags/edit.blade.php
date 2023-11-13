@extends('adminlte::page')

@section('title', 'Etiquetas')

@section('content_header')
    <h1>Actualizar Etiquetas</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif
<div class="card text-left">
    <div class="card-body">
      {!! Form::model($tag, ['route'=> ['admin.tags.update',$tag], 'method' => 'put']) !!}

          <div class="form-group">
              {!! Form::label('name', 'Nombre') !!}
              {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre de la etiqueta']) !!}
              @error('name')
                  <span class="text-danger">{{$message}}</span>
              @enderror
          </div>
          <div class="form-group">
              {!! Form::label('slug', 'Slug') !!}
              <span class="form-control">{{$tag->slug}}</span>
              @error('slug')
                  <span class="text-danger">{{$message}}</span>
              @enderror
          </div>
          <div class="form-group">
            {!! Form::label('color', 'Color') !!}
            {!! Form::select('color', $colores, null, ['class'=>'form-control', 'placeholder'=>'Seleccione un color']) !!}
            @error('color')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
          {!! Form::submit('Actualizar etiqueta', ['class' => 'btn btn-primary']) !!}

      {!! Form::close() !!}
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
