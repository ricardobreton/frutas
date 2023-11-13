@extends('theme.proanisrl.master')

@section('title', 'Ktito')

@section('body')
{{-- menu flotante --}}
@php
    $menuComponent = new App\View\Components\CargarMenu();
    $menu = $menuComponent->menu;
@endphp
@include('theme.proanisrl.partials.nav.menu-flot')
<div class="contenedor bg_color_ktito">
    <header class="header contenedor">
      <div class="logo_proani">
        <a href="./">
          <img src="{{asset('theme/proanisrl/img/knino/logo_proani.png')}}" alt="logo proani" />
        </a>
      </div>
    </header>

    <div class="bg_stampado">
            <main class="contenedor">
              <div class="main_contenedor">
                <img src="{{asset('theme/proanisrl/img/ktito/ktito-fondo.png')}}" alt="imagen central" />
              </div>
            </main>
            <section class="productos">
                @foreach ($productos as $producto)
                    <div class="caja-producto">
                        <div class="producto">
                            <img id="{{$producto->nombre_producto}}{{$producto->id}}" src="{{asset('storage/'.str_replace('public/','',$producto->img_producto))}}" alt="imagen producto">
                        </div>
                        <div class="btn-producto">
                            <a href="{{route('ktito.detalle',[$producto])}}">
                                <img class="btn-descarga" src="theme/proanisrl/img/knino/btn.png" alt="boton descarga">
                            </a>
                        </div>
                    </div>
                @endforeach
            </section>

            <footer class="footer">
              <p class="copyright">
                © 2022 Proani - Todos los derechos reservados.
              </p>
            </footer>
    </div>
  </div>

@endsection
@section('custom_js')


@endsection
