@extends('adminlte::auth.auth-page')

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop

@section('auth_header', __('Verifique su correo electrónico'))

@section('auth_body')

<div class="text-muted">
    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
</div>

@if (session('status') == 'verification-link-sent')
<br>
    <div class="text-success small">
        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
    </div>
@endif

<form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <div class="mt-3">
        <button type=submit class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            {{ __('Resend Verification Email') }}
        </button>
    </div>
</form>
<br>
<form method="POST" action="{{ route('logout') }}">
    @csrf

    <button type="submit" class="btn btn-default btn-flat float-right  btn-block">
        <i class="fa fa-fw fa-power-off text-red"></i>
        {{ __('Log Out') }}
    </button>
</form>
@stop
