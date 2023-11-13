<section class="menuflot">
    <div class="hamburger btn-icon">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <aside class="sidebar">
        <header>
            Menu
        </header>
        <nav class="sidebar-nav">

            <ul>
                <li>
                    <a href="{{asset('/')}}"><i class="ion-ios-navigate-outline"></i> <span class="">INICIO</span></a>
                </li>
                <li>
                    <a href="#"><i class="ion-bag"></i> <span>PRODUCTOS</span></a>
                    <ul class="nav-flyout">
                        @foreach ($menu as $item)
                            <li>
                                <a href="{{route($item->name_ruta,[$item->nombre])}}"><i class="ion-ios-color-filter-outline"></i>{{ strtoupper($item->nombre) }}</a>
                            </li>
                        @endforeach
                        </ul>
                </li>
                <li>
                    <a href="#"><i class="ion-ios-settings"></i> <span class="">EVENTOS</span></a>
                    <ul class="nav-flyout">
                        <li>
                            <a href="{{route('simposios')}}"><i class="ion-ios-alarm-outline"></i>SIMPOSIOS</a>
                        </li>
                        <li>
                            <a href="{{route('ferias')}}"><i class="ion-ios-camera-outline"></i>FERIAS</a>
                        </li>
                        <li>
                            <a href="{{route('adopcion')}}"><i class="ion-ios-chatboxes-outline"></i>ADOPCIONES</a>
                        </li>
                        <li>
                            <a href="{{route('voluntariado')}}"><i class="ion-ios-cog-outline"></i>VOLUNTARIADO</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('quienessomos')}}"><i class="ion-ios-briefcase-outline"></i> <span class="">QUIENES SOMOS</span></a>
                </li>
                <li>
                    <a href="{{route('contacto')}}"><i class="ion-ios-analytics-outline"></i> <span class="">CONTACTO</span></a>
                </li>
                <li>
                    <a href="{{route('guia_alimentaria')}}"><i class="ion-ios-paper-outline"></i> <span class="">GUIA ALIMENTARIA</span></a>
                </li>
                <li>
                    <a href="{{route('videos')}}"><i class="ion-ios-navigate-outline"></i> <span class="">VIDEOS</span></a>
                </li>
                @auth
                <li>
                    <a href="{{route('panel.index')}}"><i class="ion-ios-navigate-outline"></i> <span class="">PANEL</span></a>
                </li>
                @endauth
                <li>
                    @auth
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="ion-ios-navigate-outline"></i>
                        <span class="">{{ strtoupper(__('Logout')) }}</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                    @else
                        <a href="{{route('login')}}"><i class="ion-ios-navigate-outline"></i> <span class="">{{strtoupper( __('Login')) }}</span></a>
                    @endauth
                </li>
            </ul>
        </nav>
    </aside>
</section>

