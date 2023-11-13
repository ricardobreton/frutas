@extends('theme.proanisrl.master')

@section('custom_css')
    @stack('css')
    @yield('css')
    <script src="https://cdn.tailwindcss.com"></script>
@stop

@section('classes_body', 'body-class')

@section('body_data', '')

@section('body')
@php
    $menuComponent = new App\View\Components\CargarMenu();
    $menu = $menuComponent->menu;
@endphp
@include('theme.proanisrl.partials.nav.menu-flot')
{{-- navegador superior --}}
@include('theme.proanisrl.partials.nav.menu-nav-new')

    <div class="contenedor py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{$post->name}}</h1>
        <div class="text-lg text-gray-500 my-3">
            {!!$post->extract!!}
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- contenido principal --}}
            <div class="lg:col-span-2">
                <figure>
                    @if ($post->image)
                        <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="img post">
                    @else
                        <img class="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2016/07/07/15/35/puppy-1502565_1280.jpg" alt="img post">
                    @endif
                </figure>
                <div class="text-base text-gray-500 mt-4">
                    {!!$post->body!!}
                </div>
            </div>
            {{-- contenido relacionado --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 bm-4">Más en {{$post->category->name}}</h1>
                <ul>
                    @foreach ($similares as $similar)
                    <li class="mb-4">
                        <a class="flex" href="{{route('web.post.show',[$similar])}}">
                            @if ($similar->image)
                                <img class="min-w-36 h-20 object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt="imagen post">
                            @else
                                <img class="min-w-36 h-20 object-cover object-center" src="https://cdn.pixabay.com/photo/2016/07/07/15/35/puppy-1502565_1280.jpg" alt="imagen post">
                            @endif
                            <span class="ml-2 text-gray-600">{{$similar->name}}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>

    @include('theme.proanisrl.partials.footer.footer-home')
@stop

@section('custom_js')
    @stack('js')
    @yield('js')
@stop
