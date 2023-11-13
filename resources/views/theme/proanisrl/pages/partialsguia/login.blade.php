<div class="modal-login {{$ver_modal}}">
    {{-- hidden-modal --}}
    <div id="contenedor-modal">
        <div id="central">
            <div id="login">
                <div class="titulo">
                    Bienvenido
                </div>
                <form wire:submit.prevent="autenticarcion" id="loginform">
                    <input wire:model="email" type="email" class="form-control" id="email" placeholder="email">
                    @error('email')
                        <span class="text-alerta-form">{{ $message }}</span>
                    @enderror
                    <input wire:model="password" type="password" placeholder="Contraseña">
                    @error('no-autorizado')
                        <span class="text-alerta-form">{{ $message }}</span>
                    @enderror
                    <button type="submit" title="ingresar" wire:loading.attr="disabled" name="ingresar">Ingresar</button>
                    <button wire:click="verModal" wire:loading.attr="disabled" title="cancelar" name="cancelar">Cerrar</button>
                </form>
                <div class="pie-form">
                    <a href="{{route('password.request')}}" >¿Perdiste tu contraseña?</a>
                    <a href="{{route('register')}}" >¿No tienes Cuenta? Registrate</a>
                </div>
            </div>
        </div>
    </div>
</div>
