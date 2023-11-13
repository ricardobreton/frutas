@extends('theme.proanisrl.master')

@section('title', 'Ferias')

@section('body')
{{-- menu flotante --}}
@php
    $menuComponent = new App\View\Components\CargarMenu();
    $menu = $menuComponent->menu;
@endphp
@include('theme.proanisrl.partials.nav.menu-flot')
<div class="contenedor bg-plomo">
    <header class="header_event fondo-header-feria contenedor">
      <div class="header-contenido-event evento-logo-derecha">
            <div class="feria-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" fill="#ffffff">
              <path d="M62.65 52.13v22.88c0 3.38-1.61 4.99-4.97 4.99-13.07 0-26.15 0-39.22-.01-3.39 0-4.98-1.59-4.98-4.96-.01-7.17 0-14.34 0-21.51v-1.39h49.17zM38.05-.17c7.74 0 15.48.07 23.22-.04 2.53-.04 5.05 1.62 4.88 4.84-.17 3.01-.02 6.03-.04 9.05-.02 2.46-1.56 4.1-4.02 4.27-.78.06-1.57.05-2.36.05H14.99C11.56 18 10 16.45 10 13.05c0-2.89-.01-5.77 0-8.66.01-2.89 1.65-4.55 4.56-4.56 7.83-.01 15.66 0 23.49 0zm.01 50.54H12.87c-.39 0-.8.05-1.18-.04-.94-.21-1.57-.76-1.68-1.76-.11-1.01.39-1.71 1.3-2.03.52-.18 1.11-.2 1.67-.2 16.66-.01 33.32-.01 49.98 0 .56 0 1.16-.01 1.69.15.99.3 1.52 1.03 1.42 2.08-.1 1.05-.76 1.63-1.79 1.77-.43.06-.87.03-1.31.03H38.06zm-11.69-5.69c-.29-3.6 2.67-8.68 5.87-10.08.31-.14.86-.03 1.17.16 3.1 1.88 6.17 1.87 9.28.01.32-.19.85-.31 1.16-.17 3.17 1.33 6.26 6.63 5.86 10.08H26.37z"/><path d="M44.92 27.78c.04 3.84-3.04 6.99-6.83 7.01-3.75.02-6.82-3.01-6.88-6.81-.07-3.85 2.93-6.9 6.83-6.95 3.78-.05 6.84 2.95 6.88 6.75zm12.29-8.12h2.52c.02.49.06.92.06 1.34v22.28c0 1.39-.77 1.98-2.03 1.43-.31-.13-.53-.82-.53-1.26-.04-4.89-.02-9.79-.02-14.68v-9.11zM16.38 44.57V19.65c.44-.04.82-.05 1.19-.11 1.05-.16 1.36.31 1.35 1.32-.04 3.8-.02 7.6-.02 11.41v10.49c0 2.2-.2 2.35-2.52 1.81z"/></svg>
            </div>
      </div>
    </header>
    <div class="contenedor contenedor-titulo-feria">
      <img src="{{asset('theme/proanisrl/img/ferias/feria_texto.png')}}" alt="imagenes ferias">
    </div>
    <main class="contenedor">
        <section class="all-ferias">
            <div class="feria-contenedor">
                @foreach ($ferias as $row)
                <div class="card-feria">
                    <div class="imagen">
                      <div class="marco-img fig-oval">
                        <img src="{{asset(Storage::url($row->foto_evento))}}" alt="imagen ferias">
                      </div>
                      <div class="img-text img-text-rotar">
                        <div class="contenedor-img-texto">
                          <img src="{{asset('theme/proanisrl/img/btn/ferias-txt.svg')}}" alt="imagen ferias">
                          <p class="tit-feria">{{$row->titulo}}</p>
                        </div>
                      </div>
                    </div>
                    <div class="texto">
                        <span>
                            {{$row->descripcion}}
                        </span>
                    </div>
                    <div class="boton btn-vermas">
                        <img class="btn-icon" src="{{asset('theme/proanisrl/img/ferias/ver_mas.png')}}" alt="imagen boton mas info">
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        <!-- Start footer -->
        @include('theme.proanisrl.partials.btn-atras')
        <!-- End footer -->
    </main>
<!-- Start footer -->
@include('theme.proanisrl.partials.footer.footer-home')
<!-- End footer -->
  </div>
@endsection
@section('custom_js')


@endsection
