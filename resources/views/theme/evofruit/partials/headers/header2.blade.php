<header class="header"
@if ($header)
    style="background-image: url({{Storage::url($header->url)}});
    min-height: 60rem;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    padding: 5rem 0;
    "
@endif>
    <div class="contenedor contenido-header">
        <div class="barra">
            <div class="logo">
                <h1 class="nombre-sitio">Proyecto<span>Frutícola</span></h1>
            </div>
            <div class="contacto">
                <h3>{{$alcaldia->nombre}} </h3>
                <a class="telefono" href="tel:{{$alcaldia->telefono}}">{{$alcaldia->telefono}} </a>
                @include('theme.evofruit.partials.nav.navegacion')
            </div>
        </div>
        <div class="slogan">
            <h1>Rutas Frúticolas</h1>
            <p>Las mejores frutas del departamento</p>
        </div>
    </div>
</header>
