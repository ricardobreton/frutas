@extends('theme.proanisrl.master')

@section('title', 'Productos')

@section('body')
{{-- menu flotante --}}
@php
    $menuComponent = new App\View\Components\CargarMenu();
    $menu = $menuComponent->menu;
@endphp
@include('theme.proanisrl.partials.nav.menu-flot')
<header class="header_animal contenedor header_generico">
    <div class="header-contenido">
      <div class="logo_proani">
        <a href="{{asset('/')}}">
          <img src="{{asset('theme/proanisrl/img/logo_proani.avif')}}" alt="logo lideres en nutricion animal">
        </a>
      </div>
    </div>
  </header>

  <main class="contenedor text-center bg-white">
    <section class="seccion-producto-generico">
        @if (isset($producto))
        @php
            $ruta_flecha = 'theme/proanisrl/img/asset-comun/flecha_borde.png';
        @endphp
            @livewire('carrusel-producto', ['producto' =>$producto, 'ruta_flecha'=>$ruta_flecha])
        @endif
    </section>

    <div class="contenedor">
        <!-- Start btn-back -->
        @include('theme.proanisrl.partials.btn-atras')
        <!-- End btn-back -->
    </div>
</main>





<!-- Start footer -->
@include('theme.proanisrl.partials.footer.footer-home')
<!-- End footer -->

@endsection

@section('custom_js')

<style>

    .header_generico {
        background-image: url({{ Storage::url($especie->getElemento('header')->ruta_img) }});
    }
</style>

@endsection
