<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="tipo_evento"></label>
                {!! Form::select('tipo_evento', $dato_eventos, $tipo_evento, ['class'=>'form-control','wire:model'=>'tipo_evento','placeholder'=>'Tipo Evento']) !!}
                @error('tipo_evento') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="titulo"></label>
                <input wire:model="titulo" type="text" class="form-control" id="titulo" placeholder="Titulo">@error('titulo') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div wire:loading  wire:target="new_foto_evento" class="alert alert-warning alert-dismissible">
                <h5><i class="icon fas fa-exclamation-triangle"></i> Imagen Cargando!</h5>
                Espere un momento hasta que la imagen se haya procesado.
            </div>
            <div class="col-12 text-center p-3">
                @if ($new_foto_evento)
                    <img class="profile-user-img img-fluid" src="{{$new_foto_evento->temporaryUrl()}}" alt="Logo marca producto" id="new_foto_evento">
                @else
                    <img class="profile-user-img img-fluid" src="{{asset(Storage::url($old_foto_evento))}}" alt="Logo marca producto" id="img-foto">
                @endif

            </div>
            <div class="form-group">
                <div class="custom-file">
                    <input wire:model="new_foto_evento" type="file" class="custom-file-input" id="customFile{{$identificador}}" name="new_foto_evento" accept="image/*">
                    <label wire:ignore class="custom-file-label" for="customFile">Cargar logo</label>
                    <input wire:model="logo" type="hidden">
                </div>
                @error('new_foto_evento')
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
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Guardar</button>
            </div>
       </div>
    </div>
</div>
