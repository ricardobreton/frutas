@extends('theme.proanisrl.master')

@section('title', 'Detalle Knino')

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
        <a href="{{asset('/')}}">
          <img src="{{asset('theme/proanisrl/img/knino/logo_proani.png')}}" alt="logo proani" />
        </a>
      </div>
    </header>
    <div class="bg_stampado">
        @livewire('slider-img', ['producto' =>$producto])
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
