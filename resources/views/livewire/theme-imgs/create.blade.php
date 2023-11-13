<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Asignar imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="especie_id">Especie</label>
                        {!! Form::select('especie_id', $especies, null, [
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
                        {!! Form::select('seccion', $seccion_img, null, [
                            'wire:model' => 'seccion',
                            'class' => 'form-control',
                            'id' => 'seccion',
                            'placeholder' => 'Seleccione Sección',
                        ]) !!}
                        @error('seccion')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div wire:loading  wire:target="ruta_img" class="alert alert-warning alert-dismissible">
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Imagen Cargando!</h5>
                        Espere un momento hasta que la imagen se haya procesado.
                    </div>
                    <div class="col-12 text-center p-3">
                        @if ($ruta_img!=null && !$updateMode)
                            <img class="img-fluid img-alto200" src="{{$ruta_img->temporaryUrl()}}" alt="ruta_img marca producto" id="img-foto">
                        @endif
                    </div>
                    <div class="form-group">
                        <!-- <label for="customFile">Custom File</label> -->
                        <div class="custom-file">
                            <input wire:model="ruta_img" type="file" class="custom-file-input" id="customFile" name="ruta_img" accept="image/*">
                            <label wire:ignore class="custom-file-label" for="customFile">Cargar ruta_img</label>
                        </div>
                        @error('ruta_img')
                        <div class="text-danger small m-1">{{ $message }}</div>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" wire:loading.attr="disabled" wire:target="store(), ruta_img"  class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
