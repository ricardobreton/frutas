@extends('theme.proanisrl.master')

@section('title', 'productos')
@section('custom_css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
.card-logos img{
  height:100px;
  width:100%;
  background-color: #c8c9c8;
  padding: 2rem;

}

div [class^="col-"]{
  padding-left:5px;
  padding-right:5px;
}
.card{
  transition:0.5s;
  cursor:pointer;
  width: 20rem;
  margin-top: 20px;
  margin-bottom: 20px;
}
.card-title{
  font-size:15px;
  transition:1s;
  cursor:pointer;
}
.card-title i{
  font-size:15px;
  transition:1s;
  cursor:pointer;
  color:#ffa710
}
.card-title i:hover{
  transform: scale(1.25) rotate(100deg);
  color:#18d4ca;

}
.card:hover{
  transform: scale(1.05);
  box-shadow: 10px 10px 15px rgba(0,0,0,0.3);
}
.card-text{
  height:80px;
}

.card::before, .card::after {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  transform: scale3d(0, 0, 1);
  transition: transform .3s ease-out 0s;
  background: rgba(255, 255, 255, 0.1);
  content: '';
  pointer-events: none;
}
.card::before {
  transform-origin: left top;
}
.card::after {
  transform-origin: right bottom;
}
.card:hover::before, .card:hover::after, .card:focus::before, .card:focus::after {
  transform: scale3d(1, 1, 1);
}
.contenedor-card-marcas{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    grid-gap: 20px;
}
    </style>
@endsection
@section('body')
{{-- menu flotante --}}
@php
    $menuComponent = new App\View\Components\CargarMenu();
    $menu = $menuComponent->menu;
@endphp
@include('theme.proanisrl.partials.nav.menu-flot')
@include('theme.proanisrl.partials.nav.menu-nav-new')
<div class="contenedor bg-plomo">
<div class="main" style="min-height: 450px">
    <div class="container mt-2">
          <div class="contenedor-card-marcas mt-3">

            @foreach ($categoriaProductos as $catProducto)

            <a href="{{route($especiesRutas[$catProducto->especie_id],[$catProducto->especie])}}" style="text-decoration:none; color:black;">
                <div class="col-md-3 col-sm-6">
                    <div class="card card-block card-logos">
                        <h4 class="card-title text-right"><i class="material-icons">{{$catProducto->especie}}</i></h4>
                        <img src="{{asset(Storage::url($catProducto->logo))}}" alt="logo marca">
                            <h5 class="card-title mt-3 mb-3">{{$catProducto->marca}} </h5>
                    </div>
                </div>
            </a>

            @endforeach
          </div>

        </div>
</div>

<!-- Start footer -->
@include('theme.proanisrl.partials.footer.footer-home')
<!-- End footer -->
</div>
@endsection
@section('custom_js')
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


@endsection
