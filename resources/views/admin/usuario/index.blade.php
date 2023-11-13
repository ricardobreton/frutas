@extends('adminlte::page')

@section('title', 'Panel')

@section('content_header')
    <h1>Panel de Control</h1>
@stop

@section('content')
<div class="col-md-12">
    @include('partes.alertas')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Usuarios</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @can('admin.user.create')
            <a class="btn btn-sm btn-primary mb-3" href="{!! route('admin.user.create') !!}">
                Nuevo
            </a>
            @endcan
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nombre Usuario</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th style="width: 40px">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=0;
                    @endphp
                    @foreach ($usuarios as $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->myRol() }}</td>
                        <td>{{ $user->activo ?'Habilitado':'Eliminado' }}</td>
                        <td>
                            <div class="btn-group">
                            @can('admin.user.edit')
                                <a class="btn btn-sm btn-info" href="{!! route('admin.user.edit', [$user->id]) !!}">
                                    <i class="far fa-edit"></i>
                                </a>
                            @endcan
                            @can('admin.user.destroy')
                                @if ($user->activo  == '1')
                                <form action="{{ route('admin.user.destroy', [$user->id]) }}" method="POST"
                                    onsubmit='return confirm("¿Esta seguro que desea eliminar al usuario?");'>
                                    @csrf @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                            class="fas fa-user-times"></i></button>
                                </form>
                                @else
                                <form action="{{ route('admin.user.habilitar', [$user->id]) }}" method="POST"
                                    onsubmit='return confirm("¿Esta seguro que desea habilitar al usuario?");'>
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success"><i
                                            class="fas fa-user-check"></i></button>
                                </form>
                                @endif
                            @endcan
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
