@extends('theme.evofruit.master')

@section('title', 'Comunidades')
@section('custom_css')
    @parent
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop
@section('body')

<!-- LOADER -->
{{-- <div id="preloader">
    <div class="loader">
        <img src="{{asset('theme/currency/images/loader.gif')}}" alt="#" />
    </div>
</div> --}}
<!-- END LOADER -->
<!-- Start header -->
@include("theme.evofruit.partials.headers.header2")
<!-- End header -->

<!-- comunidades con potencial turistico -->
{{-- @include('theme.evofruit.partials.comu_potencial') --}}
<!-- End header -->
<main class="contenedor mt-5">
    <h2>Planta turística en el municiopo de {{$alcaldia->nombre}}</h2>
    @foreach ($secciones as $seccion)
        @include('theme.evofruit.partials.secciones')
    @endforeach
    {{-- @include('theme.evofruit.partials.servicios')
    @include('theme.evofruit.partials.hospedajes')
    @include('theme.evofruit.partials.transporte')
    @include('theme.evofruit.partials.cultural')
    @include('theme.evofruit.partials.festividades')
    @include('theme.evofruit.partials.productores') --}}
</main>

<!-- galeria de fotos-->
@include('theme.evofruit.partials.galeria')
<!-- End galeria -->

<!-- videos de la comunidad -->
@include('theme.evofruit.partials.videos')
<!-- End videos -->

<!-- Start header -->
@include('theme.evofruit.partials.footers.footer2')
<!-- End header -->


@section('custom_js')
<script>
    // $(document).ready(function(){
    //     $("#contacto").trigger('click');
    //     console.log('cliente en contacto');
    // })
</script>
@endsection
