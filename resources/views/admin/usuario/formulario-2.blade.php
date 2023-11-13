<div class="mb-2">
    <span class="small text-danger">(*) Campos obligatorios</span>
</div>
<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="form-group">
            <label class="text-muted" for="nombre_p">Alias</label><span class="small text-danger">(*)</span>
            <input type="text" name="name" class="form-control form-control-sm" id="nombre_p" placeholder="alias" value="{{ old('name', $usuario->name ?? null) }}" required>
            @error('name')
                <div class="text-danger small m-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="text-muted" for="email">Email</label><span class="small text-danger">(*)</span>
            <input type="email" name="email" class="form-control form-control-sm" id="email" placeholder="email" value="{{ old('email', $usuario->email ?? '') }}" required>
            @error('email')
                <div class="text-danger small m-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="text-muted" for="password">Password</label> {!! isset($usuario)?'<span class="small text-info">Llenar solo si se cambiara la contraseña</span>':'<span class="small text-danger">(*)</span>'!!}
            <input type="password" name="password" class="form-control form-control-sm" id="password" placeholder="password" {{ isset($usuario)?'':'required'}}>
            @error('password')
                <div class="text-danger small m-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="text-muted" for="rol">Rol</label><span class="small text-danger">(*)</span>
            @php
                $rol_user = '';
                if (isset($usuario)) {
                    $rol_user = $usuario->myRol();
                }
            @endphp
            {!! Form::select('rol', $comboRoles, old('rol',$rol_user), ['class'=>'form-control form-control-sm', 'required'=>'required']) !!}
            @error('rol')
                <div class="text-danger small m-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4 pl-1 mt-1">
        <div class="text-center">
            @php
                $image_url = "https://www.proanisrl.com/img/avatar/default.png";
                if (isset($usuario)) {
                    $image_url = asset(Storage::url('avatar/'.$usuario->avatar));
                }
            @endphp
            <img id="img-avatar" class="profile-user-img img-fluid img-circle" src="{{$image_url}}" alt="User profile picture">
        </div>
        <div class="form-group">
            {{-- <label class="text-muted" for="customFile">Avatar</label> --}}
            <div class="custom-file">
                <input type="file" class="custom-file-input form-control-sm" id="customFile" name="avatar" accept="image/*" onchange="mostrar()">
                <label class="custom-file-label" for="customFile">Selecciona una foto</label>
            </div>
            @error('avatar')
                <div class="text-danger small m-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="text-muted" for="nombres">Nombres</label><span class="small text-danger">(*)</span>
            <input type="text" name="nombres" class="form-control form-control-sm" id="nombres" placeholder="nombres" value="{{ old('nombres', $persona->nombres ?? '') }}" required>
            @error('nombres')
                <div class="text-danger small m-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="text-muted" for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" class="form-control form-control-sm" id="apellidos" placeholder="apellidos" value="{{ old('apellidos', $persona->apellidos ?? '') }}" >
            @error('apellidos')
                <div class="text-danger small m-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="form-group">
            <label class="text-muted" for="ci_nit">Carnet de Identidad</label>
            <input type="text" name="ci_nit" class="form-control form-control-sm" id="ci_nit" placeholder="ci" value="{{ old('ci_nit', $persona->ci_nit ?? '') }}" >
            @error('ci_nit')
                <div class="text-danger small m-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="text-muted" for="telefonos">Teléfono</label>
            <input type="text" name="telefonos" class="form-control form-control-sm" id="telefonos" placeholder="teléfono" value="{{ old('telefonos', $persona->telefonos ?? '') }}" >
            @error('telefono')
                <div class="text-danger small m-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="text-muted" for="direccion">Dirección</label>
            <input type="text" name="direccion" class="form-control form-control-sm" id="direccion" placeholder="dirección" value="{{ old('direccion', $persona->direccion ?? '') }}" >
            @error('direccion')
                <div class="text-danger small m-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>