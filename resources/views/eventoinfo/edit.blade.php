@extends('adminlte::page')

@section('title', 'Editar informacion evento')

@section('content_header')
<h1>Panel de Control admin</h1>
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

<h3>
    {{$evento->titulo}}
</h3>
<div>
    <a href="{{route('admin.evento.index')}}">Eventos</a>
</div>
<div class="card">
    <div class="card-body" style="font-size: 12px">
        {!! Form::open(['route'=>['admin.evento.storeinfo',$eventoInfo->id]]) !!}
        <label>Ingresar Mas información</label>
        <x-adminlte-text-editor name="mas_info" :config="$configEditor">
            {!! old('mas_info', $eventoInfo->mas_info?? '') !!}
        </x-adminlte-text-editor>
        @include('partes.btn-guardar-center')
        {!! Form::close() !!}
    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="{{asset('/css/admin_custom.css')}}">
@stop

@section('js')
<script>
    console.log('Hi!');

</script>
@stop
@section('plugins.Summernote', true)
