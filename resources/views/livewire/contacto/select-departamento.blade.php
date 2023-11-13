<div>
    <form class="formulario" wire:submit.prevent="seleccionarDepartamento">
        <div class="campo">
            <label>Departamento</label>
            <div class="inline">
                {!! Form::select('departamento', $departamentos, null, ['wire:model'=>'departamento', 'id'=>'departamento','placeholder'=>'Departamento']) !!}
                <button class="btn-enviar" >Buscar</button>
            </div>
        </div>
    </form>
</div>
