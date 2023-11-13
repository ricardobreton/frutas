<div>
    <form class="formulario" action="#" method="post">
        <br>
        <div class="campo">
            <span class="titulo-guia">REGISTRAR MASCOTAS</span>
        </div>
        <div class="campo">
            <label for="nombres">Nombre</label>
            <div class="inline">
                <input type="text" name="nombres" id="nombres" wire:model="nombres">
            </div>
            @error('nombres') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="campo">
            <div class="radio-group">
                <input wire:model="tipo_mascota" wire:change="actualizarRaza" type="radio" id="option1" name="tipo_mascota" value="Perro">
                <label for="option1">Perro</label>

                <input wire:model="tipo_mascota" wire:change="actualizarRaza" type="radio" id="option2" name="tipo_mascota" value="Gato">
                <label for="option2">Gato</label>
            </div>
        </div>
        <div class="campo">
            <label for="raza">Raza</label>
            <div class="inline">
                {!! Form::select('raza', $lista_mascotas, null, ["wire:model"=>"selected_raza"]) !!}
            </div>
            @error('raza') <span class="error text-danger">{{ $message }}</span> @enderror

        </div>
        <div class="campo">
            <label for="edad">Edad (años)</label>
            <div class="inline">
                @php
                    $edades = array();
                    for ($i=0; $i < 21; $i++) {
                        $edades[$i] = $i;
                    }
                    $edades[0] = 'Menos de 1 año';
                    $edades[20] = 'Más de 20 años';
                @endphp
                {!! Form::select('edad', $edades, null, ["wire:model"=>"selected_edad"]) !!}
            </div>
            @error('edad') <span class="error text-danger">{{ $message }}</span> @enderror

        </div>
        <div class="campo">
            <label for="peso">Peso (K)</label>
            <div class="inline">
                <input wire:model="peso" type="number" value="0,00" name="peso" id="peso">
            </div>
            @error('peso') <span class="error text-danger">{{ $message }}</span> @enderror

        </div>
        <div class="campo">
            <label for="vacunas">Vacunas</label>
            <div class="inline">
                <input wire:model="vacunas" type="text" name="vacunas" id="vacunas">
            </div>
            @error('vacunas') <span class="error text-danger">{{ $message }}</span> @enderror

        </div>
        <div wire:loading  wire:target="foto" class="alert alert-warning alert-dismissible">
            <h5><i class="icon fas fa-exclamation-triangle"></i> Imagen Cargando!</h5>
            Espere un momento hasta que la Imagen se haya procesado.
        </div>
        <div class="col-12 text-center p-3">
            @if ($foto!=null)
                <img class="" src="{{$foto->temporaryUrl()}}" alt="foto" id="img-foto">
            @endif
        </div>
        <div class="form-group">
            <!-- <label for="customFile">Custom File</label> -->
            <div class="custom-file">
                <input wire:model="foto" type="file" class="custom-file-input" id="customFile" name="foto" accept="image/*">
                {{-- <label wire:ignore class="custom-file-label" for="customFile">Cargar foto</label> --}}
            </div>
            @error('foto')
            <div class="text-danger small m-1">{{ $message }}</div>
            @enderror

        </div>
        @auth
            <div class="campo">
                <button type="button" wire:click.prevent="store()" wire:loading.attr="disabled" wire:target="store(), foto" class="btn-enviar">Guardar Mascota</button>
            </div>
        @endauth
    </form>
</div>
