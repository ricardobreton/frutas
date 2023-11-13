<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="categoria_id"></label>
                {!! Form::select('categoria_id', $categorias, $categoria_id, ['class'=>'form-control','wire:model'=>'categoria_id', 'placeholder'=>'Seleccione Categoria']) !!}
            </div>
            <div class="form-group">
                <label for="nombre_producto"></label>
                <input wire:model="nombre_producto" type="text" class="form-control" id="nombre_producto" placeholder="Nombre Producto">@error('nombre_producto') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div wire:loading  wire:target="new_image_prod" class="alert alert-warning alert-dismissible">
                <h5><i class="icon fas fa-exclamation-triangle"></i> Imagen Cargando!</h5>
                Espere un momento hasta que la imagen se haya procesado.
            </div>
            <div class="col-12 text-center p-3">
                @if ($new_image_prod)
                    <img class="profile-user-img img-fluid" src="{{$new_image_prod->temporaryUrl()}}" alt="nueva imagen producto" id="img-foto">
                @else
                    <img class="profile-user-img img-fluid" src="{{asset(Storage::url($img_producto_edit))}}" alt="Imagen producto" id="img-foto">
                @endif
            </div>
            <div class="form-group">
                <div class="custom-file">
                    <input wire:model="new_image_prod" type="file" class="custom-file-input" id="customFile" name="logo" accept="image/*">
                    <label wire:ignore class="custom-file-label" for="customFile">Cargar Imagen Producto</label>
                    <input wire:model="img_producto_edit" type="hidden">
                </div>
                @error('new_image_prod')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div wire:loading  wire:target="new_image_datos" class="alert alert-warning alert-dismissible">
                <h5><i class="icon fas fa-exclamation-triangle"></i> Imagen Cargando!</h5>
                Espere un momento hasta que la imagen se haya procesado.
            </div>
            <div class="col-12 text-center p-3">
                @if ($new_image_datos)
                    <img class="profile-user-img img-fluid" src="{{$new_image_datos->temporaryUrl()}}" alt="nueva imagen datos" id="img-foto">
                @else
                    @if ($img_datos_edit != '')
                    <img class="profile-user-img img-fluid" src="{{asset(Storage::url($img_datos_edit))}}" alt="Imagen datos" id="img-foto">
                    @endif
                @endif
            </div>
            <div class="form-group">
                <div class="custom-file">
                    <input wire:model="new_image_datos" type="file" class="custom-file-input" id="customFile{{$identificador}}" name="logo" accept="image/*">
                    <label wire:ignore class="custom-file-label" for="customFile">Cargar Imagen tabla de datos de nutrición</label>
                    <input wire:model="img_datos_edit" type="hidden">
                </div>
                @error('new_image_datos')
                    <span class="error text-danger">{{ $message }}</span>
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
                <button type="button" wire:click.prevent="update()" wire:loading.attr="disabled" wire:target="update(), new_image_datos, new_image_prod" class="btn btn-primary" data-dismiss="modal">Guardar</button>
            </div>
       </div>
    </div>
</div>
