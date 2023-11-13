<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="categoria_id"></label>
                        {!! Form::select('categoria_id', $categorias, null, ['class'=>'form-control','wire:model'=>'categoria_id', 'placeholder'=>'Seleccione Categoria']) !!}
                        @error('categoria_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
            <div class="form-group">
                <label for="nombre_producto"></label>
                <input wire:model="nombre_producto" type="text" class="form-control" id="nombre_producto" placeholder="Nombre Producto">@error('nombre_producto') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div wire:loading  wire:target="img_producto" class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Imagen Cargando!</h5>
                Espere un momento hasta que la imagen se haya procesado.
            </div>
            <div class="col-12 text-center p-3">
                @if ($img_producto)
                    <img class="profile-user-img img-fluid" src="{{$img_producto->temporaryUrl()}}" alt="Datos producto" id="img-datos">
                @endif
            </div>
            <div class="form-group">
                <!-- <label for="customFile">Custom File</label> -->
                <div class="custom-file">
                    <input wire:model="img_producto" type="file" class="custom-file-input" id="customFilePro{{$identificador}}" name="img_producto" accept="image/*">
                    <label wire:ignore class="custom-file-label" for="customFile">Cargar imagen del producto</label>
                </div>
                @error('img_producto')
                <div class="text-danger small m-1">{{ $message }}</div>
                @enderror
            </div>
            <div wire:loading  wire:target="img_datos" class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Imagen Cargando!</h5>
                Espere un momento hasta que la imagen se haya procesado.
            </div>
            <div class="col-12 text-center p-3">
                @if ($img_datos)
                    <img class="profile-user-img img-fluid" src="{{$img_datos->temporaryUrl()}}" alt="Datos producto" id="img-datos">
                @endif
            </div>
            <div class="form-group">
                <!-- <label for="customFile">Custom File</label> -->
                <div class="custom-file">
                    <input wire:model="img_datos" type="file" class="custom-file-input" id="customFileDatos{{$identificador}}" name="img_datos" accept="image/*">
                    <label wire:ignore class="custom-file-label" for="customFile">Cargar imagen datos</label>
                </div>
                @error('img_datos')
                <div class="text-danger small m-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="descripcion"></label>
                <textarea wire:model="descripcion" placeholder="Descripción" class="form-control" name="descripcion" id="descripcion" cols="30" rows="2">
                    Descripción
                </textarea>
                @error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
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
