<style>
   /* .navbar {
  overflow: hidden;
  background-color: #333;
} */

/* .navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
} */

.dropdown {
  float: left;
  overflow: hidden;
  margin-bottom: 0;
  padding: .5rem 0rem;
}
@media(min-width: 768px){
    .dropdown {
        border-right: 1px solid #000;
    }
}
.dropdown .dropbtn {
  /* font-size: 16px; */
  /* border: none; */
  /* outline: none; */
  /* color: white; */
  /* padding: 14px 16px; */
  /* background-color: inherit; */
  /* font-family: inherit; */
  /* margin: 0; */
}

/* .navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
} */

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
  border: none;

}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
<div class="nav-header-container contenedor">
  <div class="box logo-pro-center">
    <img src="{{asset('theme/proanisrl/img/general/somos_familia.png')}}" alt="Logo proani srl">
  </div>
  <div class="box menu-super-fondo">
    <nav class="nav-principal">
      <a class="nav-link" href="{{route('inicio')}}">Inicio</a>
      <a class="nav-link" href="{{route('quienessomos')}}">Quienes Somos</a>
      <a class="nav-link" href="{{route('ver.productos')}}">Productos</a>
      @if (Route::currentRouteName() == 'inicio')
        <a class="nav-link" href="{{route('web.post.index')}}">Noticias</a>
      @else
      <div class="dropdown">
        <a href="{{route('web.post.index')}}" class="nav-link">Noticias
          <i class="fas fa-sort-down"></i>
        </a>
        @php
            $categorias = \App\Models\Category::all();
        @endphp
        @if (count($categorias)>0)
        <div class="dropdown-content">
            @foreach ($categorias as $categoria)
                <a href="{{route('web.post.category',[$categoria])}}">{{$categoria->name}}</a>
            @endforeach
        </div>
        @endif
      </div>
      @endif
      <a class="nav-link" href="{{route('contacto')}}">Contáctanos</a>
    </nav>
    <div class="icon-container">
      <input class="form-control" type="text" id="searchInput" placeholder="Buscar.." />
      <img class="lupa-buscar" src="{{asset('theme/proanisrl/img/general/lupa.png')}}" alt="lupa buscar">
    </div>
  </div>
</div>
