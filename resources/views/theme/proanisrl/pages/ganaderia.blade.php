@extends('theme.proanisrl.master')

@section('title', 'Ganadería')

@section('body')
{{-- menu flotante --}}
@php
    $menuComponent = new App\View\Components\CargarMenu();
    $menu = $menuComponent->menu;
@endphp
@include('theme.proanisrl.partials.nav.menu-flot')
<header class="header_animal_bovino fondo-header-ganaderia contenedor">
    <div class="header-contenido-animal">
      <div class="logo_posicion_der">
        <div class="fondo_icon_logo">
          <div class="mas-info">

          </div>
          <a href="{{asset('/')}}">
              <img src="{{asset('theme/proanisrl/img/logo_proani.avif')}}" alt="icon actividades">
          </a>
        </div>
      </div>
    </div>

  </header>

  <main class="contenedor text-center">
      <p class="texto-ganaderia">Suplementos minerales listo para consumo, equilibrado para cubrir las deficiencias  y desequilibrio de macro y micro minerales en bovinos en pastoreo en suelos de alta fertilidad,  para mejorar la conversión alimenticia, generando mayor ganancia  y mayor índices productivos en bovinos de engorde.</p>
  </main>
  <section class="marcas-ganaderia bg-panal contenedor">
    <div class="contenido-marcas">
        @foreach ($categorias as $categoria)
        <div class="marcas">
            <div class="marca-producto">
                <img src="{{asset('storage/'.str_replace('public/','',$categoria->logo))}}" alt="logo marcas ganaderia">
            </div>
            <div class="btn-masinfo">
              <a href="{{route('ganaderiadetalle',[$categoria])}}">
                <img class="btn-icon" src="{{asset('theme/proanisrl/img/ganaderia/boton_mas_info.png')}}" alt="mas informacion">
              </a>
            </div>
        </div>
        @endforeach
    </div>
</section>
<div class="contenedor contenedor-btn">
    <!-- Start btn-back -->
    @include('theme.proanisrl.partials.btn-atras')
    <!-- End btn-back -->
</div>

<!-- Start footer -->
@include('theme.proanisrl.partials.footer.footer-home')
<!-- End footer -->

@endsection

@section('custom_js')


@endsection
