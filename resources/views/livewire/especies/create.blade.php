<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create Nueva Especie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="nombre">Nombre Especie</label>
                <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="codigo_svg">Icono SVG</label>
                <textarea wire:model="codigo_svg" type="text" class="form-control" id="codigo_svg" placeholder="Codigo Svg" cols="30" rows="5"></textarea>
                @error('codigo_svg') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div wire:loading  wire:target="icono" class="alert alert-warning alert-dismissible">
                <h5><i class="icon fas fa-exclamation-triangle"></i> Imagen Cargando!</h5>
                Espere un momento hasta que la imagen se haya procesado.
            </div>
            <div class="col-12 text-center p-3">
                @if ($icono!=null && !$updateMode)
                    <img class="profile-user-img img-fluid" src="{{$icono->temporaryUrl()}}" alt="icono marca producto" id="img-foto">
                @endif
            </div>
            <div class="form-group">
                <div class="custom-file">
                    <input wire:model="icono" type="file" class="custom-file-input" id="customFile" name="icono" accept="image/*">
                    <label wire:ignore class="custom-file-label" for="customFile">Cargar icono</label>
                </div>
                @error('icono')
                <div class="text-danger small m-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="activo">Icono Activo</label>
                <input wire:model="activo" type="checkbox" id="activo" checked>
                @error('activo') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="usar_icono">Usar Icono PNG</label>
                <input wire:model="usar_icono" type="checkbox" id="usar_icono" >@error('usar_icono') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
