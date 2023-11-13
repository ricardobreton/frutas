@extends('theme.proanisrl.master')

@section('title', 'Videos')

@section('body')
{{-- menu flotante --}}
@php
$menuComponent = new App\View\Components\CargarMenu();
$menu = $menuComponent->menu;
@endphp
@include('theme.proanisrl.partials.nav.menu-flot')
<header class="contenedor">
    <div class="header-videos">
      <a href="./">
        <img src="{{asset('theme/proanisrl/img/logo_proani.avif')}}" alt="icon actividades simposios">
      </a>
    </div>
    <section>
        @include('theme.proanisrl.partials.nav.menu-animal')
  </section>
  </header>
      <main class="contenedor text-center bg-white">
          <section class="videos">
              <div class="contenedor-videos">
                @foreach ($lista_videos as $video)
                @if ($video->tipo_video == 'Facebook')
                    <x-video_facebook ruta="{{$video->ruta}}"></x-video_facebook>
                @else
                    <x-video_youtube ruta="{{$video->ruta}}"></x-video_youtube>
                @endif
                @endforeach
              </div>
          </section>
      <!-- Start btn-back -->
    @include('theme.proanisrl.partials.btn-atras')
    <!-- End btn-back -->
      </main>

<!-- Start footer -->
@php
    $cls_bg = "bg-white"
@endphp
@include('theme.proanisrl.partials.footer.footer-home')
<!-- End footer -->
@endsection
@section('custom_js')
<script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>
@endsection
