@extends('theme.proanisrl.master')

@section('title', 'Ganadería Detalle')

@section('body')
{{-- menu flotante --}}
@php
    $menuComponent = new App\View\Components\CargarMenu();
    $menu = $menuComponent->menu;
@endphp
@include('theme.proanisrl.partials.nav.menu-flot')
<div class="bg-ganaderia-black contenedor">
    <header class="header-detalle-producto-ganaderia">
      <div class="header-contenido-detalle-producto">
        <a href="{{asset('/')}}">
          <img
            src="{{asset('theme/proanisrl/img/asset-comun/logo_proani.png')}}"
            alt="icon lideres en nutricion animal"
          />
        </a>
      </div>
    </header>

    <main class="contenedor text-center">
      <p class="texto-producto-detalle texto-white">
        Suplementos minerales listo para consumo, equilibrado para cubrir las
        deficiencias y desequilibrio de macro y micro minerales en bovinos en
        pastoreo en suelos de alta fertilidad, para mejorar la conversión
        alimenticia, generando mayor ganancia y mayor índices productivos en
        bovinos de engorde.
      </p>
    </main>
    <section class="seccion-producto">
        @php
            $className='title-product';
        @endphp
        @if (isset($producto))
            @livewire('carrusel-producto', ['producto' =>$producto, 'className'=>$className])
        @endif
    </section>
    @php
        $cls_bg = 'text-white';
        $ancla_atras = 'a-back-white';//a-back
        $btn_icon_white = 'btn-icon-white';
    @endphp
    <div class="contenedor contenedor-btn">
        <!-- Start btn-back -->
        @include('theme.proanisrl.partials.btn-atras')
        <!-- End btn-back -->
    </div>
   <!-- Start footer -->

    @include('theme.proanisrl.partials.footer.footer-home')
    <!-- End footer -->
  </div>







@endsection

@section('custom_js')


@endsection
