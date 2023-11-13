<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">

            <div class="form-group">
                <label for="especie_id">Especie</label>
                {!! Form::select('especie_id', $especies, $especie_id, [
                    'wire:model' => 'especie_id',
                    'class' => 'form-control',
                    'id' => 'especie_id',
                    'placeholder' => 'Seleccione Especie',
                ]) !!}
                @error('especie_id')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="seccion">Sección</label>
                {!! Form::select('seccion', $seccion_img, $seccion, [
                    'wire:model' => 'seccion',
                    'class' => 'form-control',
                    'id' => 'seccion',
                    'placeholder' => 'Seleccione Sección',
                ]) !!}
                @error('seccion')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div wire:loading  wire:target="new_image" class="alert alert-warning alert-dismissible">
                <h5><i class="icon fas fa-exclamation-triangle"></i> Imagen Cargando!</h5>
                Espere un momento hasta que la imagen se haya procesado.
            </div>
            <div class="col-12 text-center p-3">
                @if ($new_image && $updateMode)
                    <img class="img-alto200 img-fluid" src="{{$new_image->temporaryUrl()}}" alt="nueva imagen" id="new_image">
                @else
                    <img class="img-alto200 img-fluid" src="{{asset(Storage::url($ruta_img))}}" alt="antiguao imagen" id="ruta_img">
                @endif
            </div>
            <div class="form-group">
                <!-- <label for="customFile">Custom File</label> -->
                <div class="custom-file">
                    <input wire:model="new_image" type="file" class="custom-file-input" id="customFile" name="new_image" accept="image/*">
                    <label wire:ignore class="custom-file-label" for="customFile">Cargar imagen</label>
                </div>
                @error('new_image')
                <div class="text-danger small m-1">{{ $message }}</div>
                @enderror
            </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" wire:loading.attr="disabled" wire:target="update(), new_image" data-dismiss="modal">Guardar</button>
            </div>
       </div>
    </div>
</div>
