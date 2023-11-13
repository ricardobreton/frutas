@extends('adminlte::page')

@section('title', 'Getión Clientes')

@section('content_header')
    <h1>Gestión de clientes</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Lista de clientes</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <div class="pt-2">
      <table class="table table-sm table-striped table-bordered" id="tbl-datos">
        <thead>
          <th>#</th>
          <th>Nombre Completo</th>
          <th>Correo</th>
          <th>Teléfono</th>
          <th>Macotas</th>
          <th></th>
        </thead>
        <tbody>
          @php
              $i=1;
            //   dd($clientes);
          @endphp
          @foreach ($clientes as $cliente)
          <tr>
            <td>{{$i++}}</td>
            <td>{{$cliente->full_name}}</td>
            <td>{{!is_null($cliente->usuario)?$cliente->usuario->email:''}}</td>
            <td>{{$cliente->telefonos}}</td>
            <td class="text-center">{{$cliente->num_mascotas}}</td>
            <td>
              <div class="btn-group text-muted">
                <a class="btn btn-sm btn-warning" href="{{route('admin.cliente.ver.cliente',[$cliente])}}">Ver</a>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('/css/admin_custom.css')}}">
@stop

@section('js')
    <script>
      $(document).ready(function(){
        $('#tbl-datos').DataTable({
          "autoWidth": false,
          "responsive": true,
          "language": {
                "url": "{{asset('vendor/datatables/es/es_es.json')}}"
              },
        });
      });
    </script>
@stop
@section('plugins.Datatables', true)
