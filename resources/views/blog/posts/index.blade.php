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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
            <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif"
                style="
                    background-image: url(@if($post->image) {{Storage::url($post->image->url)}} @else 'https://cdn.pixabay.com/photo/2016/07/07/15/35/puppy-1502565_1280.jpg' @endif);
                    "
                >
                <div class="w-full h-full px-8 flex flex-col justify-center">
                    <div class="py-3">
                        @foreach ($post->tags as $tag)
                         <a href="{{route('web.post.tag',[$tag])}}" class="inline-block px-3 h-10 bg-{{$tag->color}}-600 text-white rounded-full">{{$tag->name}}</a>
                        @endforeach
                    </div>
                    <h1 class="text-4xl text-white leading-8 font-bold">
                        <a href="{{route('web.post.show',[$post])}}">
                            {{$post->name}}
                        </a>
                    </h1>
                </div>
            </article>
            @endforeach

        </div>
        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>

    @include('theme.proanisrl.partials.footer.footer-home')
@stop

@section('custom_js')
    @stack('js')
    @yield('js')
@stop
