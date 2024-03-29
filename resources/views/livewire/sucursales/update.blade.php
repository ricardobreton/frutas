<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Sucursal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="departamento"></label>
                        {!! Form::select('departamento', $departamentos, $departamento, [
                            'class'=>'form-control',
                            'id'=>'departamento',
                            'placeholder'=>'Departamento',
                            'wire:model'=>'departamento'
                        ]) !!}
                    </div>
            <div class="form-group">
                <label for="nombre_sucursal"></label>
                <input wire:model="nombre_sucursal" type="text" class="form-control" id="nombre_sucursal" placeholder="Nombre Sucursal">@error('nombre_sucursal') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="direccion"></label>
                <input wire:model="direccion" type="text" class="form-control" id="direccion" placeholder="Direccion">@error('direccion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="coordenadas"></label>
                <input wire:model="coordenadas" type="text" class="form-control" id="coordenadas" placeholder="Coordenadas">@error('coordenadas') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="responsable_id"></label>
                {!! Form::select('responsable_id', $personas, $responsable_id, [
                    'wire:model'=>'responsable_id',
                    'class'=>'form-control',
                    'id'=>'responsable_id',
                    'placeholder'=>'Responsable'
                ]) !!}
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
