@extends('theme.proanisrl.master')

@section('title', 'Simposios')

@section('body')

{{-- menu flotante --}}
@php
$menuComponent = new App\View\Components\CargarMenu();
$menu = $menuComponent->menu;
@endphp
@include('theme.proanisrl.partials.nav.menu-flot')
<header class="header_event fondo-header-simposio contenedor">
    <div class="header-contenido-event">
      <div class="event-title-simposio">
          <span>simposios</span>
      </div>
    </div>
    <div class="contenedorp bg-white">
      <div class="franja-izq"></div>
      <div class="franja-der"></div>
    </div>
  </header>
<div class="contenedor bg-plomo">
  <div class="simposio-icon">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" fill="#f9b800">
      <path d="M64.88 64.1c.07-3.03-.28-5.8-1.52-8.4-1.61-3.38-4.36-5.05-7.79-5.67-.75-.13-1.44-.28-2.09.49-.54.64-4.38.44-5.05-.08-.55-.42-.8-1.01-.7-1.69.11-.74.47-1.43 1.22-1.5 1.31-.13 2.64-.14 3.96-.09.35.01.81.36 1 .69.33.56.79.63 1.31.7 5.76.7 9.39 4.36 10.56 10.1.35 1.72.45 3.5.68 5.38H80v15.96H0v-15.9c21.61.01 43.23.01 64.88.01z"/>
      <path d="M64.42 50.24c-1.37-.9-2.75-1.98-4.27-2.74-1.24-.62-2.66-.84-3.99-1.26-.29-.09-.54-.29-.82-.42-.79-.36-1.56-.92-2.39-1.02-1.37-.17-2.78-.13-4.16 0-1.98.18-3.51 2.2-3.49 4.41.03 2.15 1.61 4.09 3.57 4.24 1.38.1 2.78.06 4.17.03.37-.01.81-.09 1.11-.31.83-.62 1.66-.4 2.49-.14 2.77.88 4.44 2.89 5.23 5.76.25.91.37 1.85.57 2.84H15.49c-.02-.22-.04-.43-.04-.64 0-3.14-.07-6.29.01-9.43.22-8.51 5.61-15.63 13.23-18.03.26-.08.69.03.9.22 2.87 2.58 6.19 3.97 9.94 4.08 3.83.12 7.32-1.07 10.31-3.64.68-.58 1.2-.78 2.11-.45 5.88 2.2 9.74 6.44 11.75 12.57.37 1.12.48 2.33.7 3.51.03.21.02.42.02.42z"/>
      <path d="M40 35c-9.03 0-16.66-7.46-16.71-17.39C23.25 7.53 30.81.42 39.17.02c9.8-.47 17.59 7.63 17.54 17.56C56.65 27.47 49.07 34.98 40 35z"/>
    </svg>
</div>
  <main class="contenedor">
      <div class="titulo_simposio">
          <p>todo lo que necesitas saber sobre...</p>
      </div>
      <section class="all-simposios">
          <div class="simposio-contenedor">
            @foreach ($simposios as $row)
            <div class="card-simposio">
                <div class="imagen">
                    <img src="{{asset(Storage::url($row->foto_evento))}}" alt="imagen simposio">
                </div>
                <div class="boton">
                    <img class="btn-icon" src="{{asset('theme/proanisrl/img/simposios/mas_info.png')}}" alt="imagen boton mas info">
                </div>
            </div>
            @endforeach
          </div>
      </section>
      <!-- Start btn-back -->
      @include('theme.proanisrl.partials.btn-atras')
      <!-- End btn-back -->
  </main>

  <!-- Start footer -->

@include('theme.proanisrl.partials.footer.footer-home')
<!-- End footer -->
@endsection
@section('custom_js')


@endsection
