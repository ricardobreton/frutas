<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Nuevo Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="tipo_evento"></label>
                {!! Form::select('tipo_evento', $dato_eventos, null, ['class'=>'form-control','wire:model'=>'tipo_evento','placeholder'=>'Tipo Evento']) !!}
                @error('tipo_evento') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="titulo"></label>
                <input wire:model="titulo" type="text" class="form-control" id="titulo" placeholder="Titulo">@error('titulo') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div wire:loading  wire:target="foto_evento" class="alert alert-warning alert-dismissible">
                <h5><i class="icon fas fa-exclamation-triangle"></i> Imagen Cargando!</h5>
                Espere un momento hasta que la imagen se haya procesado.
            </div>
            <div class="col-12 text-center p-3">
                @if ($foto_evento!=null)
                    <img class="profile-user-img img-fluid" src="{{$foto_evento->temporaryUrl()}}" alt="foto_evento marca producto" id="img-foto">
                @endif
            </div>
            <div class="form-group">
                <!-- <label for="customFile">Custom File</label> -->
                <div class="custom-file">
                    <input wire:model="foto_evento" type="file" class="custom-file-input" id="customFile{{$identificador}}" name="foto_evento" accept="image/*">
                    <label wire:ignore class="custom-file-label" for="customFile">Cargar foto evento</label>
                </div>
                @error('foto_evento')
                <div class="text-danger small m-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="descripcion"></label>
                <input wire:model="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripcion">@error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" wire:loading.attr="disabled" wire:target="store(), foto_evento"  class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
