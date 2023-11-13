<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear nueva Categoria Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
			<form>
                <div class="form-group">
                    <label for="marca"></label>
                    <input wire:model="marca" type="text" class="form-control" id="marca" placeholder="Marca">
                    @error('marca')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="especie"></label>
                    {!! Form::select('especie', $especies, null, ['class'=>'form-control','wire:model'=>'especie', 'id'=>'especie', 'placeholder'=>'Especie']) !!}
                    @error('especie') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div wire:loading  wire:target="logo" class="alert alert-warning alert-dismissible">
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Imagen Cargando!</h5>
                    Espere un momento hasta que la imagen se haya procesado.
                </div>
                <div class="col-12 text-center p-3">
                    @if ($logo!=null)
                        <img class="profile-user-img img-fluid" src="{{$logo->temporaryUrl()}}" alt="Logo marca producto" id="img-foto">
                    @endif
                </div>
                <div class="form-group">
                    <!-- <label for="customFile">Custom File</label> -->
                    <div class="custom-file">
                        <input wire:model="logo" type="file" class="custom-file-input" id="customFile{{$identificador}}" name="logo" accept="image/*">
                        <label wire:ignore class="custom-file-label" for="customFile">Cargar logo</label>
                    </div>
                    @error('logo')
                    <div class="text-danger small m-1">{{ $message }}</div>
                    @enderror
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" wire:loading.attr="disabled" wire:target="store(), logo" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
