<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Carrusel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input wire:model="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripcion">@error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="especie">Seleccionar Especie</label>
                        {!! Form::select('especie', $especies, null, ['class'=>'form-control','wire:model'=>'especie_id', 'id'=>'especie_id', 'placeholder'=>'Especie', 'required'=>'required']) !!}
                        @error('especie_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div wire:loading  wire:target="url_imagen" class="alert alert-warning alert-dismissible">
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Imagen Cargando!</h5>
                        Espere un momento hasta que la imagen se haya procesado.
                    </div>
                    <div class="col-12 text-center p-3">
                        @if ($newImage)
                            <img class="profile-user-img img-fluid" src="{{$newImage->temporaryUrl()}}" alt="Logo marca producto" id="new_image">
                        @else
                            <img class="profile-user-img img-fluid" src="{{asset(Storage::url($url_imagen))}}" alt="Logo marca producto" id="img-foto">
                        @endif
                    </div>
                    <div class="form-group">
                        <!-- <label for="customFile">Custom File</label> -->
                        <div class="custom-file">
                            <input wire:model="newImage" type="file" class="custom-file-input" id="customFile" name="newImage" accept="image/*" required>
                            <label wire:ignore class="custom-file-label" for="customFile">Cargar Imagen</label>
                        </div>
                        @error('newImage')
                        <div class="text-danger small m-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="orden">Orden</label>
                        <input wire:model="orden" type="number" class="form-control" id="orden" placeholder="Orden" required>
                        @error('orden') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="activa">Activo</label>
                        <input wire:model="activa" type="checkbox" class="form-control" id="activa">
                        @error('activa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" wire:loading.attr="disabled" wire:target="update(), newImage" class="btn btn-primary" data-dismiss="modal">Guardar</button>
            </div>
       </div>
    </div>
</div>
