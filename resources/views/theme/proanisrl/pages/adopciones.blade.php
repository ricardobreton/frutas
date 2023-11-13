@extends('theme.proanisrl.master')

@section('title', 'Adopciones')
@section('classes_body')
    {{'bg-patitas'}}
@endsection
@section('body')
{{-- menu flotante --}}
@php
    $menuComponent = new App\View\Components\CargarMenu();
    $menu = $menuComponent->menu;
@endphp
@include('theme.proanisrl.partials.nav.menu-flot')
<div class="contenedor bg-plomo">
<header class="header_event fondo-header-adopciones contenedor bg-plomo">
    <div class="header-contenido-event">
      <div class="event_logo">
        <div class="contenedor-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" fill="#ffffff"><path d="M17.64 64.76c-.57-2.48-1.13-4.91-1.7-7.34-.09-.38-.19-.76-.27-1.15-.22-1.08-.52-2.1-1.14-3.06-.7-1.07-.94-2.32-.94-3.61 0-7.99-.01-15.98 0-23.96.01-4.08 3.34-7.44 7.33-7.44 4.13 0 7.46 3.32 7.48 7.49.01 1.46-.01 2.91.01 4.37 0 .28.08.59.21.83.87 1.67 1.76 3.33 2.67 4.98.14.24.41.48.67.57 5.02 1.73 10.05 3.45 15.07 5.16 2.06.7 3.15 2.75 2.51 4.77-.66 2.07-2.72 3.13-4.83 2.42-5.44-1.84-10.86-3.73-16.32-5.53-1.46-.48-2.42-1.33-3.12-2.69-1.71-3.34-3.52-6.62-5.29-9.93-.05-.09-.1-.17-.23-.21.1.23.2.46.3.68 1.89 4.08 3.77 8.16 5.67 12.24.34.73 1.06.97 1.73 1.2 4.56 1.53 9.12 3.03 13.68 4.55.8.26 1.59.54 2.39.79.31.1.43.22.4.58-.53 7.14-1.03 14.28-1.57 21.42-.19 2.57-2.26 4.3-4.8 4.09-2.31-.19-4.04-2.32-3.86-4.79.41-5.85.84-11.69 1.26-17.54.01-.19 0-.39 0-.66-.22.05-.42.09-.61.15-2.99.89-5.99 1.79-8.98 2.68-.84.25-.84.26-.65 1.09.92 4.02 1.85 8.05 2.76 12.07.7 3.08-1.7 5.78-4.81 5.39-5.93-.75-11.85-1.52-17.78-2.31-2.27-.3-3.87-2.09-3.92-4.3-.05-2.19 1.44-4.15 3.59-4.42 1.12-.14 2.29.08 3.43.22 3.04.38 6.08.8 9.12 1.2.19.02.34 0 .54 0z"/><path d="M64.98 41.45c.36-.34.68-.66 1.02-.96.6-.53 1.38-.5 1.88.07.48.54.45 1.29-.1 1.85-.08.08-.16.17-.26.24-.9.7-1.45 1.48-1.45 2.77 0 1.52-.91 2.72-2.17 3.59-.24.16-.48.31-.79.51.2.22.37.4.54.58 2.4 2.59 4.81 5.16 7.19 7.77.47.51.8 1.16 1.21 1.72.13.18.29.38.49.45 1.65.63 3.32.86 5.03.25.8-.28 1.55.09 1.81.84.27.78-.08 1.54-.9 1.85-1.84.7-3.71.64-5.59.18-.19-.05-.38-.09-.57-.14-.02 0-.04 0-.11.02-.08.18-.16.4-.26.6-.6 1.24-1.55 2.09-2.82 2.62-.27.11-.55.36-.68.62-1.06 2.1-2.08 4.23-3.11 6.34-.64 1.31-2.01 1.86-3.22 1.28-1.21-.58-1.64-2.01-1-3.33.88-1.82 1.76-3.64 2.67-5.44.2-.39.14-.62-.14-.92-2.64-2.82-5.26-5.66-7.89-8.49-.76-.81-.76-.81-1.84-.37-1.72.71-3.43 1.42-5.15 2.12-.87.35-1.69.24-2.41-.37-.71-.6-.97-1.37-.77-2.27.2-.87.75-1.45 1.56-1.79 2.35-.97 4.7-1.92 7.04-2.9.26-.11.53-.33.67-.57.55-.92 1.31-1.59 2.32-2.11-.19-.2-.33-.36-.48-.51-1.25-1.35-2.51-2.7-3.76-4.05-1.19-1.29-1.15-3.13.07-4.28 1.21-1.14 2.99-1.04 4.19.23.36.38.72.77 1.09 1.17 2.42-1.36 4.63-1.13 6.69.83zM30.82 3c4.88.04 8.74 4.01 8.7 8.93-.04 4.91-3.98 8.83-8.85 8.79-4.74-.03-8.61-4.07-8.58-8.95.04-4.87 3.95-8.81 8.73-8.77z"/></svg>
        </div>
      </div>
      <div class="title_adopta contenedor">
          <img src="{{asset('theme/proanisrl/img/adopta/fondo-letras-adopta.png')}}" alt="imagenes adopta">
      </div>
    </div>
  </header>

  <main class="contenedor bg-plomo">
      <section class="all-adopcion">
          <div class="feria-contenedor">
            @foreach ($adopciones as $row)
            <div class="card-feria">
                <div class="imagen">
                  <div class="marco-img fig-oval-inv">
                    <img src="{{asset(Storage::url($row->foto_evento))}}" alt="imagen adopcion">
                  </div>
                  <div class="img-text-der">
                    <div class="contenedor-img-texto">
                      <img class="img-alin-der" src="{{asset('theme/proanisrl/img/btn/ferias-txt.svg')}}" alt="imagen adopcion">
                      <p class="tit-adopta">{{$row->titulo}}</p>
                    </div>
                  </div>
                </div>
                <div class="texto">
                    <span>
                        {{$row->descripcion}}
                    </span>
                </div>
                <div class="boton btn-vermas">
                    <img class="btn-icon" src="theme/proanisrl/img/ferias/ver_mas.png" alt')}}="imagen boton mas info">
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
</div>
@endsection
@section('custom_js')


@endsection
