@extends('theme.proanisrl.master')

@section('title', 'Quienes Somos')
@section('custom_css')
    @livewireStyles
@endsection
{{-- @section('classes_body')
    {{'bg-patitas'}}
@endsection --}}
@section('body')
    {{-- menu flotante --}}
@php
    $menuComponent = new App\View\Components\CargarMenu();
    $menu = $menuComponent->menu;
@endphp
    @include('theme.proanisrl.partials.nav.menu-flot')
    <main class="contenedor bg-white guia-gato">
        <div class="contenedor-gato">
            <div class="content-formulario">
                @if(session('error'))
                    <div style="padding: 2rem; background-color: #f92e2ebf; ">
                        {{session('error')}}
                    </div>
                @endif
                @if (Auth::user())
                <div class="campo">
                    <span class="titulo-guia">Bienvenido</span>
                </div>
                    <p> {{Auth::user()->persona->full_name}}</p>
                @else
                    <form class="formulario" action="{{route('registro')}}" method="post">
                        @csrf
                        <div class="campo">
                            <span class="titulo-guia">MIS DATOS</span>
                        </div>
                        <div class="campo">
                            <label for="nombres">Nombres</label>
                            <div class="inline">
                                <input type="text" name="nombres" id="nombres" value="{{ old('nombres', '') }}">
                                @error('nombres')
                                    <span class="text-alerta-form">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="campo">
                            <label for="apellidos">Apellidos</label>
                            <div class="inline">
                                <input type="text" name="apellidos" id="apellidos" value="{{ old('apellidos', '') }}">
                                @error('apellidos')
                                    <span class="text-alerta-form">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="campo">
                            <label for="telefono">Teléfono</label>
                            <div class="inline">
                                <input type="text" name="telefono" id="telefono" value="{{ old('telefono', '') }}">
                            </div>
                                @error('telefono')
                                    <span class="text-alerta-form">{{ $message }}</span>
                                @enderror
                        </div>

                        <div class="campo">
                            <input type="checkbox" checked name="whatsapp" id="whatsapp"> <span>Usa Whatsapp</span>
                        </div>
                        <div class="campo">
                            <label for="email">Correo electrónico</label>
                            <div class="inline">
                                <input type="text" name="email" id="email" value="{{ old('email', '') }}">
                                @error('email')
                                    <span class="text-alerta-form">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="campo">
                            <x-label for="password" :value="__('Password')" />
                            <x-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />
                        </div>
                        <div class="campo">
                            <x-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
                            @error('password')
                                <span class="text-alerta-form">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="campo">
                            <button class="btn-enviar" type="submit" name="registrarme" id="registrame">Registrarme</button>
                        </div>
                    </form>
                    <form>
                        <div class="campo">
                            @livewire('login-guia')
                        </div>
                    </form>
                @endif
                <br>
                <div>
                    @auth
                        @if (Auth::user()->persona->mascotas->count() > 0)
                            <div class="campo">
                                <span class="titulo-guia">MIS MASCOTAS</span>
                            </div>
                            <div class="lista-mascotas">
                                @foreach (Auth::user()->persona->mascotas as $mascota)
                                    <div class="mascota">
                                        <img src="{{asset('storage/'.$mascota->foto)}}" alt="Imagen mascota">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endauth
                </div>
                <br>
                @livewire('mascotas.registrar-mascota')
            </div>
            <div class="content-gato">
                <div class="logo">
                    <a href="{{ asset('/') }}">
                        <img src="{{ asset('theme/proanisrl/img/asset-comun/logo_proani_2.png') }}"
                            alt="proani somos familia">
                    </a>
                </div>
                <div class="gato">
                    <img src="{{ asset('theme/proanisrl/img/guia_alimentacion/bg_gatitus.png') }}" alt="gatito">
                </div>
            </div>
        </div>
        <div class="contenedor-tabla-guia">
            <p class="txt-bold">Guia de alimentación</p>
            <table class="tabla-guia">
                <tbody>
                    <tr>
                        <td>Peso del perro (Kg)</td>
                        <td>Ración Diaria (g)</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </main>
    <section class="contenedor bg-white registro-mascota">
        <div class="formulario-registro">
            <p class="txt-bold">¿Que alimento es ideal para tu consentido?</p>
            <form action="">
                <div class="campo">
                    <div class="inline">
                        <input type="text" name="nombre-mascota" id="nombre-mascota">
                    </div>
                    <label for="nombre-mascota">Nombre Mascota</label>
                </div>
                <div class="campo-fila">
                    <div class="campo-item">
                        <input class="d-bloque" type="text" name="raza" id="raza">
                        <label class="d-bloque" for="raza">Raza</label>
                    </div>
                    <div class="campo-item">
                        <input class="d-bloque" type="text" name="edad" id="edad">
                        <label class="d-bloque" for="edad">Edad</label>
                    </div>
                    <div class="campo-item">
                        <input class="d-bloque" type="text" name="peso" id="peso">
                        <label class="d-bloque" for="peso">Peso</label>
                    </div>
                    <div class="campo-item">
                        <input class="d-bloque" type="text" name="condicion-fisica" id="condicion-fisica">
                        <label class="d-bloque" for="condicion-fisica">Condición Fisica</label>
                    </div>
                </div>
                <div class="campo">
                    <div class="inline">
                        <button class="btn-enviar">Consultar</button>
                    </div>
                </div>
            </form>
            <div class="campo">
                <p><span class="txt-bold">Respuesta:</span> Para Lobo se recomienda <span class="txt-bold">Kanino Adulto
                        Raza Mediana Grande</span></p>
            </div>
        </div>

    </section>
    <div class="contenedor img-perros">
        <img src="{{ asset('theme/proanisrl/img/guia_alimentacion/bg_perritus.png') }}" alt="Imgane de perros">
    </div>

    <!-- Start footer -->
    @php
        $cls_bg = 'bg-white';
    @endphp
    @include('theme.proanisrl.partials.footer.footer-home')
    <!-- End footer -->
@endsection
@section('js')

    @livewireScripts
    {{-- @livewireScripts --}}
    <script type="text/javascript">
        window.livewire.on('closeModal', () => {
            $('#createDataModal').modal('hide');
        });
    </script>
@stop
