<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Sucursale</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="departamento"></label>
                {!! Form::select('departamento', $departamentos, null, [
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
                <input wire:model="direccion" type="text" class="form-control" id="direccion" placeholder="Direccón">@error('direccion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="coordenadas"></label>
                <input wire:model="coordenadas" type="text" class="form-control" id="coordenadas" placeholder="Coordenadas">@error('coordenadas') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="responsable_id"></label>
                {!! Form::select('responsable_id', $personas, null, [
                    'wire:model'=>'responsable_id',
                    'class'=>'form-control',
                    'id'=>'responsable_id',
                    'placeholder'=>'Responsable'
                ]) !!}
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
