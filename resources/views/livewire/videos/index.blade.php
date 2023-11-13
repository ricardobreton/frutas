@extends('adminlte::page')

@section('title', 'Panel control Administrador')

@section('content_header')
<h1>Administrar Videos</h1>
@stop
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('videos')
        </div>
    </div>
</div>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('/css/admin_custom.css')}}">
@stop

@section('js')
<script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>

{{-- @livewireScripts --}}
<script type="text/javascript">
	window.livewire.on('closeModal', () => {
		$('#createDataModal').modal('hide');
	});
</script>

@stop

