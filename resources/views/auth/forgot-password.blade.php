@extends('adminlte::auth.auth-page')

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop

@section('auth_header', __('adminlte::adminlte.forgot-password'))

@section('auth_body')
<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />
<!-- Validation Errors -->
<x-auth-validation-errors class="mb-4" :status="session('errors')" />


<div class="mb-4 text-sm text-gray-600">
    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
</div>
<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
    </div>

    <div class="mt-3">
        <button type=submit class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            {{-- <span class="fas fa-sign-in-alt"></span> --}}
            {{ __('Email Password Reset Link') }}
        </button>
    </div>
</form>
@stop