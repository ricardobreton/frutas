@extends('adminlte::page')

@section('title', 'Perfil de Usuario')

@section('content_header')
    <h1>Perfil de Usuario {{$user_logeado->name}}</h1>
@stop
@php
$config = [
    'format' => 'DD-MM-YYYY',
    'dayViewHeaderFormat' => 'MMM YYYY',
    // 'minDate' => "js:moment().startOf('month')",
    'maxDate' => "js:moment().endOf('day')",
    // 'daysOfWeekDisabled' => [0, 6],
    'locale' => 'es'
];
@endphp
@section('content')
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{Auth::user()->adminlte_image()}}" alt="User profile picture">
                </div>
                <p>
                    @if (session()->has('mensaje'))
                        <span class="text-success small m-1">{{ session()->pull('mensaje') }}</span>
                    @endif
                </p>
                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                <p class="text-muted text-center">{{Auth::user()->adminlte_desc()}}</p>
                <p>
                    <form action="{{route('avatar.update')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <!-- <label for="customFile">Custom File</label> -->
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="avatar" required>
                                <label class="custom-file-label" for="customFile">Elegir un Avatar</label>
                            </div>
                            @error('avatar')
                                <div class="text-danger small m-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type=submit class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                            <span class="far fa-user-circle"></span>
                            {{ 'Actualizar Avatar' }}
                        </button>
                    </form>
                </p>
                <br>
                @if ($errors->any())
                <div class="small text-danger">
                  <label>Corregir los siguientes datos</label>
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
                @if (session('msjpassword'))
                    <div class="small text-success">
                        {{ session('msjpassword') }}
                    </div>
                @endif
                <form action="{{route('mypassword.update')}}" method="post">
                  @csrf
                  <div class="text-muted">
                    <label class="current_password">Contraseña Actual</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                  </div>
                  <div class="text-muted">
                    <label class="" >Nueva Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                  </div>
                  <div class="text-muted">
                    <label class="" >Confirmar Contraseña</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                  </div>
                  <br>
                  <button type=submit class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                    <span class="fas fa-user-lock"></span>
                    {{ 'Cambiar Contraseña' }}
                </button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Datos Personales</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="settings">
                    <form class="form-horizontal" action="{{route('cliente.update',[$persona])}}" method="post" >
                      @csrf
                      @method('put')
                      <div class="form-group row">
                        <label for="ci_nit" class="col-sm-2 col-form-label">CI o NIT</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="ci_nit" id="ci_nit" placeholder="CI o NIT"
                          value="{{ old('ci_nit', $persona->ci_nit ?? '') }}" required>
                          @error('ci_nit') <span class="invalid-feedback">{{ $message }}</span> @enderror
                          {{-- error text-danger  --}}
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nombres" class="col-sm-2 col-form-label">Nombres</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombres"
                          value="{{ old('nombres', $persona->nombres ?? '') }}" required>
                          @error('nombres') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos"
                          value="{{ old('apellidos', $persona->apellidos ?? '') }}">
                          @error('apellidos') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
                        <div class="col-sm-10">
                          <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Dirección"
                          value="{{ old('direccion', $persona->direccion ?? '') }}">
                          @error('direccion') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="telefonos" class="col-sm-2 col-form-label">Teléfonos</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="telefonos" id="telefonos" placeholder="Telefonos"
                          value="{{ old('telefonos', $persona->telefonos ?? '') }}">
                          @error('telefonos') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="whatsapp" class="col-sm-2 col-form-label">Whatsapp</label>
                        <div class="col-sm-10">
                          <input type="checkbox" name="whatsapp" id="whatsapp" {{($persona->whatsapp=='1')?'checked="checked"':''}}> Check solo si el número tiene whatsapp
                          @error('whatsapp') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                      </div>
                      <x-adminlte-input-date name="fecha_nac" label="Fecha Nacimiento" igroup-size="sm" label-class=""
                        :config="$config" value="{{ old('fecha_nac', (($persona->fecha_nac != '' || !is_null($persona->fecha_nac))?$persona->fecha_nac->format('d-m-Y'):'') ?? '') }}" placeholder="Fecha Nacimiento">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-calendar-day"></i>
                            </div>
                        </x-slot>
                      </x-adminlte-input-date>


                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-warning">Guardar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('plugins.TempusDominusBs4', true)
@section('js')
    <script>
        $('.custom-file-input').on('change', function(event) {
            var inputFile = event.currentTarget;
            $(inputFile).parent()
                .find('.custom-file-label')
                .html(inputFile.files[0].name);
        });
    </script>
@stop
