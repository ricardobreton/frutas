<div class="form-group">
    <label for="seccion">Sección</label>
    @isset($secciones)
        {!! Form::select('seccion', $secciones, $seccion->seccion ?? null, ['class'=>'form-control','placeholder'=>'Seccion']) !!}
    @endisset
    @error('seccion') <span class="error text-danger">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Estado</p>
    @php
        // dd($seccion);
    @endphp
    <label class="mr-2">
        {!! Form::radio('status', 1, old('status',isset($seccion)?$seccion->status==1:false) ) !!}
        Borrador
    </label class="mr-2">
    <label>
        {!! Form::radio('status', 2, old('status',isset($seccion)?$seccion->status==2:false) ) !!}
        Publicado
    </label>
    <hr>
    @error('status')
        <br>
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset($seccion)
                @if ($seccion->image)
                    <img id="picture" src="{{Storage::url($seccion->image->url)}}" alt="imagen sección">
                @else
                    <img id="picture" src="https://cdn.pixabay.com/photo/2016/07/07/15/35/puppy-1502565_1280.jpg" alt="img de prueba">
                @endif
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2016/07/07/15/35/puppy-1502565_1280.jpg" alt="img de prueba">
            @endisset
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se mostrara en la sección') !!}
            {!! Form::file('file', ['class'=>'form-control-file', 'accept'=> 'image/*']) !!}
        </div>
        @error('file')
            <span class="text-danger">{{$message}}</span>
        @enderror
        <p>Seleccionar una imagen solo si desea mostrarla antes de las tablas o texto que ingresara abajo</p>
    </div>
</div>
<div class="form-group">
    {!! Form::label('contenido', 'contenido sección:') !!}
    {{-- {!! Form::textarea('contenido', null, ['class'=>'form-control']) !!} --}}
    <x-adminlte-text-editor name="contenido" :config="$configEditor">
        {{ old('contenido', $seccion->contenido ?? '') }}
    </x-adminlte-text-editor>
    @error('contenido')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
