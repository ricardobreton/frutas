@extends('theme.proanisrl.master')

@section('title', 'Contacto')
@section('custom_css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
    integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
    crossorigin=""/>
@endsection
{{-- @section('classes_body')
    {{'bg-patitas'}}
@endsection --}}
@section('body')
{{-- menu flotante --}}
@php
    $menuComponent = new App\View\Components\CargarMenu();
    $menu = $menuComponent->menu;
@endphp
@include('theme.proanisrl.partials.nav.menu-flot')
<header class="contenedor bg-white">
    <div class="header-contenido-contacto">
      <div class="contacto-bloque">
          <div class="redes-sociales">
              <div class="fondo_icon_header">
                  <a href="https://es-la.facebook.com/proanisrl/">
                    <img class="btn-icon" src="{{asset('theme/proanisrl/img/social_media/facebook_cir.png')}}" alt="redes sociales">
                  </a>
                </div>
                <div class="fondo_icon_header">
                  <a href="https://www.instagram.com/proanisrl/?hl=es">
                    <img class="btn-icon" src="{{asset('theme/proanisrl/img/social_media/instagram_cir.png')}}" alt="redes sociales">
                  </a>
                </div>
                <div class="fondo_icon_header">
                  <a href="https://www.youtube.com/channel/UC2ievPPA6SdEGvCEE_GfYkg">
                    <img class="btn-icon" src="{{asset('theme/proanisrl/img/social_media/youtube_cir.png')}}" alt="redes sociales">
                  </a>
                </div>
          </div>
      </div>
      <div class="contacto-bloque">
          <div class="somos-familia">
              <div class="logo-somos-familia">
                  <a href="./">
                      <img class="btn-icon" src="{{asset('theme/proanisrl/img/asset-comun/logo-proani-letras-negras.png')}}" alt="logo lideres en nutricion animal">
                    </a>
              </div>
          </div>
      </div>
    </div>

</header>
<div class="contenedor bg-white bg-contacto">
    <main class="contenedor text-center">
    <section class="form-contacto">
        <h3>Consulta con un especialista</h3>
        @livewire('contacto.select-departamento', ['departamentos' => $departamentos])
        @livewire('contacto.select-sucursal', ['sucursales' => $sucursales])
        @livewire('contacto.enviar-consulta')

    </section>


    </main>

</div>

<!-- Start footer -->
@php
    $cls_bg = "bg-white"
@endphp
@include('theme.proanisrl.partials.footer.footer-home')
<!-- End footer -->
@endsection
@section('custom_js')
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
    integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
    crossorigin=""></script>

<script>
    const sucursales = @json($sucursales);
    // console.log(Object.keys(sucursales).length);
    // console.log(sucursales)
    var direccion_sucursal = 'Oficina central';
    var coordenadas = [-17.851, -63.254];
    var nombre_sucursal = 'Oficinas de ProAni SRL';
    var datos = {
            direccion_sucursal: direccion_sucursal ,
            coordenadas: coordenadas.join(','),
            nombre_sucursal: nombre_sucursal
        }
    if (Object.keys(sucursales).length > 0) {
        var sucursal = sucursales[0];
        datos = {
            direccion_sucursal: sucursal.direccion ,
            coordenadas: sucursal.coordenadas,
            nombre_sucursal: sucursal.nombre_sucursal
        }

        var radioBtnSucursales = document.getElementsByName('sucursal');
        var radioSelected = radioBtnSucursales[0];
        radioSelected.checked = true;
        radioSelected.dispatchEvent(new Event('change'));
        // console.log(radioBtnSucursales[0]);
    }
</script>
<script src="{{asset('theme/proanisrl/js/maps.js')}}"></script>
<script>
    document.body.onload = function() {

       Livewire.emit('mostrarMapa', datos);
    }

    Livewire.on('mostrarMapa', datos => {
        coordenadas = datos.coordenadas.split(',');
        nombre_sucursal = datos.nombre_sucursal;
        direccion_sucursal = datos.direccion;
        aniadir_marcador(map, coordenadas, nombre_sucursal, direccion_sucursal);
        centrarMarcador(map,coordenadas);

    });

    Livewire.on('abrirLink', link => {
        var win = window.open(link, '_blank');
        win.focus();
    });
</script>
@endsection
