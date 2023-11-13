<div>
    <div class="contenedor-ubicaciones">
        <div wire:ignore id="map" class="map"></div>
        <div class="list-sucursales">
            <ul>
                @foreach ($sucursales as $fila)
                <li>
                    <input type="radio" wire:model="sucursal_id" wire:click="buscaSucursal()" name="sucursal" value="{{$fila->id}}">
                    <span>{{$fila->nombre_sucursal}}</span>
                    <dl>
                        <dt>{{$fila->persona->full_name}} </dt>
                        <dd>Cel.:{{$fila->persona->telefonos}}</dd>
                    </dl>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
