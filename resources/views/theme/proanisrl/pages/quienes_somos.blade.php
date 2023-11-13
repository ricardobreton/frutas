@extends('theme.proanisrl.master')

@section('title', 'Quienes Somos')
@section('custom_css')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@stop
@section('body')
{{-- menu flotante --}}
@php
$menuComponent = new App\View\Components\CargarMenu();
$menu = $menuComponent->menu;
@endphp
@include('theme.proanisrl.partials.nav.menu-flot')
<div class="contenedor ">
    <div class="bg-nosotros" style="" >
      <div class="contenedor-nosotoros">
        <div class="proani-letras">
          <div class="proani-texto">
            <a href="{{asset('/')}}">
                <span class="pro">PRO</span><span class="ani">ANI</span>
            </a>
          </div>
          <a href="{{asset('/')}}">
            <img src="{{asset('theme/proanisrl/img/nosotros/proani.png')}}" alt="proani letras">
          </a>
        </div>
        <div class="historia">
          <h2><span>NUESTRA</span>HISTORIA</h2>
          <div class="cuadro-historia">
            <div class="titulo-historia">1977</div>
            <div class="texto-historia">
              <div class="cuadro-padre">
                <div class="linea-hijo-top"></div>
                <div class="linea-hijo-top"></div>
              </div>
              <p>A su retorno de Europa y luego de soñar durante años con un emprendimiento dedicado a cuidar la salud y bienestar de los animales,
                Alexsis y Raúl Serrano inauguran Lassie, la primer veterinaria de Santa Cruz.
              </p>
              <div class="cuadro-padre">
                <div class="linea-hijo-bottom"></div>
                <div class="linea-hijo-bottom"></div>
              </div>
            </div>
          </div>
          <div class="cuadro-historia">
            <div class="titulo-historia">1989</div>
            <div class="texto-historia">
              <div class="cuadro-padre">
                <div class="linea-hijo-top"></div>
                <div class="linea-hijo-top"></div>
              </div>
              <p>
                Primero en forma artesanal y luego de manera más tecnificada, doce años más tarde  a la apertura de la Veterinaria,
                Alexis y Raúl continúan expandiendo su sueño montando una fábrica de alimentos para mascotas a la que llaman ProAni.
              </p>
              <div class="cuadro-padre">
                <div class="linea-hijo-bottom"></div>
                <div class="linea-hijo-bottom"></div>
              </div>
            </div>
          </div>
          <div class="cuadro-historia">
            <div class="titulo-historia">2005</div>
            <div class="texto-historia">
              <div class="cuadro-padre">
                <div class="linea-hijo-top"></div>
                <div class="linea-hijo-top"></div>
              </div>
              <p>
                Con la muerte de Raúl, quien fallece luego de una enfermendad cuyo tratamiento consume una buena parte de los recursos del emprendimiento,
                los dos hijos mayores de Alexis y Raúl, Miguel y Eduardo, toman la posta en la conducción de ProAni. Mariana, la hija menor, se une más
                adelante en 2015.
              </p>
              <div class="cuadro-padre">
                <div class="linea-hijo-bottom"></div>
                <div class="linea-hijo-bottom"></div>
              </div>
            </div>
          </div>
          <div class="cuadro-historia">
            <div class="titulo-historia">2010/2019</div>
            <div class="texto-historia">
              <div class="cuadro-padre">
                <div class="linea-hijo-top"></div>
                <div class="linea-hijo-top"></div>
              </div>
              <p>
                Proani Inicia un proceso de transformación tecnológica ...
              </p>
              <div class="cuadro-padre">
                <div class="linea-hijo-bottom"></div>
                <div class="linea-hijo-bottom"></div>
              </div>
            </div>
          </div>
          <div class="cuadro-historia">
            <div class="titulo-historia">2021</div>
            <div class="texto-historia">
              <div class="cuadro-padre">
                <div class="linea-hijo-top"></div>
                <div class="linea-hijo-top"></div>
              </div>
              <p>
                Propulsados por su nueva Arquitectura Estratégica, Son familia no mascotas, ProAni inicia su expansión nacional e internacional.
              </p>
              <div class="cuadro-padre">
                <div class="linea-hijo-bottom"></div>
                <div class="linea-hijo-bottom"></div>
              </div>
            </div>
          </div>
          <h2><span>NUESTRO</span>MANIFIESTO</h2>
          <P>
            Es la expresión fundamental de nuestra convicción más profunda, aquella verdad irrefutable que fuimos descubriendo en el camino
            y que da vida a todo lo que hacemos.
          </P>
          <p><span>¿QUIÉN DIJO QUE SOLO QUIENES TIENEN TU SANGRE SON TU FAMILIA?</span></p>
          <P>
            Un amigo es mi hermano incluso si no lleva mi sangre, no se parece a mi o habla en lenguas que no entiendo. si no piensa
            o no cree lo mismo que yo, para él sigo siendo su hermano...
          </P>
          <p>Aún cuando a veces puedo fallarle. Un amigo es familia. Punto.</p>
          <h2><span>NUESTRO</span>PROPÓSITO</h2>
          <P>Inspiramos a las personas a vivir con respeto y armonía con todas las especies que forman parte de nuestra existencia.</P>
          <p>Todos los negocios tenemos un fin último que va más allá de los réditos econonómicos: el binestar humano.</p>
          <p>
            Nuestra Misión de Transformación Masiva establece el CÓMO buscamos contribuir a ese biniestar colectivo.
            Ese CÓMO es una combinación de lo que nos gusta hacer, de lo que somos buenos haciendo, de lo que el mundo necesita
            y por lo que la sociedad está dispuesta a pagar.
          </p>
          <h2><span>NUESTRO</span>NEGOCIO</h2>
          <p>
            La definición de nuestro negocio establece las necesidades especificas que atendemos en nuestro día a día. Esta definición va
            más allá de los productos y/o servicios que ofrecemos, se extiende al valor intangible que representamos para nuestros clientes.
          </p>
          <p>
            <span>FELICIDAD Y BIENESTAR ACCESIBLE PARA LOS MÁS INCONDINIONALES.</span>
          </p>
          <p>
          Creamos productos y servicios de calidad asequibles para el cuidado de los miembros más incondicionales de la familia.
          </p>

        </div>
      </div>
      <div class="carrusel-contenedor">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item">
              <img src="{{asset('theme/proanisrl/img/carrusel/perro1.png')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item active">
                <img src="{{asset('theme/proanisrl/img/carrusel/gato1.png')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{asset('theme/proanisrl/img/carrusel/perro2.png')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{asset('theme/proanisrl/img/carrusel/gato2.png')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{asset('theme/proanisrl/img/carrusel/perro3.png')}}" class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
      </div>
    </div>
</div>


<!-- Start footer -->
@php
    $cls_bg = "bg-white"
@endphp
@include('theme.proanisrl.partials.footer.footer-home')
<!-- End footer -->
@endsection
@section('custom_js')
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection
