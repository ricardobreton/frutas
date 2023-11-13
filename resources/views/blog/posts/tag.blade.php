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

    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold mb-8">Etiqueta: {{$tag->name}}</h1>
        @foreach ($posts as $post)
            <x-card-post :post="$post"/>
        @endforeach
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
