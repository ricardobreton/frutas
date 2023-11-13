@extends('theme.currency.master')

@section('custom_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body', 'body-class')

@section('body_data', '')

@section('body')

    <div class="wrapper">
        <h1>esto es de page</h1>
    </div>
@stop

@section('custom_js')
    @stack('js')
    @yield('js')
@stop
