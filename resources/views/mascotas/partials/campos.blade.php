<div class="form-group">
    <!-- <label for="customFile">Custom File</label> -->
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile" name="foto" accept="image/*" onchange="mostrar()">
        <label class="custom-file-label" for="customFile">cargar foto</label>
    </div>
    @error('foto')
    <div class="text-danger small m-1">{{ $message }}</div>
    @enderror
</div>
<div class="form-group text-muted">
    <label class="text-muted" for="nombres">Nombres</label>
    <input type="text" name="nombres" class="form-control" id="nombres" placeholder="nombres" value="{{ old('nombres', $mascota->nombres ?? '') }}" required>
    @error('nombres')
        <div class="text-danger small m-1">{{ $message }}</div>
    @enderror
</div>
<x-adminlte-input-date name="fecha_nac" label="Cumpleaños" igroup-size="sm" label-class="text-muted"
    :config="$config" value="{{ old('fecha_nac', (isset($mascota)?$mascota->fecha_nac->format('d-m-Y'):'') ?? '') }}" placeholder="Cumpleaños" required>
    <x-slot name="appendSlot">
        <div class="input-group-text bg-dark">
            <i class="fas fa-calendar-day"></i>
        </div>
    </x-slot>
</x-adminlte-input-date>
<div class="form-group text-muted">
    <label class="text-muted" for="sexo">Sexo</label>
    {!! Form::select('sexo', $comboSexo, old('sexo',$mascota->sexo ?? ''), ['class'=>'form-control text-muted', 'required'=>'required']) !!}
    @error('sexo')
        <div class="text-danger small m-1">{{ $message }}</div>
    @enderror
</div>
<div class="form-group text-muted">
    <label class="descripcion">Descripción</label>
    <textarea name="descripcion" class="form-control" rows="3" placeholder="Descripción (Opcional)">{{old('descripcion', $mascota->descripcion ?? '')}}</textarea>
</div>