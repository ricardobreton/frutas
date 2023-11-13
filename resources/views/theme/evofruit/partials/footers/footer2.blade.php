<footer class="footer mt-5"
@if ($footer)
    style="background-image: url({{Storage::url($footer->url)}});
    height: 60rem;
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    "
@endif
>
    <div class="contenedor">
        <div class="barra">
            <div class="logo">
                <h1 class="nombre-sitio">Proyecto<span>Frutícola</span></h1>
            </div>
            <div class="contacto">
                <h3>{{$alcaldia->nombre}}</h3>
                @include('theme.evofruit.partials.nav.navegacion')
            </div>
        </div>
    </div>
    <p class="copyright">Todos los derechos reservados &copy; Consultora Wayra</p>
</footer>
