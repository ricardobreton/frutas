<div>
    <form class="formulario" wire:submit.prevent="enviarWhatsapp">
        @if ($sucursal)
            <div class="sucursal-select" style="margin-bottom: 2rem;">
                <span style="font-weight:bold;">{{$sucursal->nombre_sucursal}} </span>
                <dl>
                    <dt>{{$sucursal->persona->full_name}} </dt>
                    <dd>Cel.:{{$sucursal->persona->telefonos}}</dd>
                </dl>
            </div>
        @endif

        <div class="formulario-select">
            <div class="campo">
                <label style="font-size: 1.3rem;
                text-transform: uppercase;" for="especie">Especie</label>
                <div class="inline">
                    <input style="outline:none" type="text" wire:model="especie" name="especie" id="especie">
                </div>
            </div>
            <div class="campo">
                <label style="font-size: 1.3rem;
                text-transform: uppercase;" for="edad">Edad</label>
                <div class="inline">
                    <input style="outline:none" type="text" wire:model="edad" name="edad" id="edad">
                </div>
            </div>
            <div class="campo">
                <label style="font-size: 1.3rem;
                text-transform: uppercase;" for="medida">Medida</label>
                <div class="inline">
                    <input style="outline:none" type="text" wire:model="medida" name="medida" id="medida">
                </div>
            </div>
            <div class="campo">
                <label style="font-size: 1.3rem;
                text-transform: uppercase;" for="fases">Fases</label>
                <div class="inline">
                    <input style="outline:none" type="text" wire:model="fases" name="fases" id="fases">
                </div>
            </div>
            <div class="campo">
                <label style="font-size: 1.3rem;
                text-transform: uppercase;" for="consulta">Escribe tu consulta</label>
                <div class="inline">
                    <textarea style="outline:none" wire:model="consulta" name="consulta" id="consulta" cols="30" rows="4"></textarea>
                </div>
            </div>
            @if ($sucursal)
            <div class="campo center">
                <button type="submit" class="btn-enviar text-center">Consultar</button>
            </div>
            @endif
        </div>
    </form>
</div>
