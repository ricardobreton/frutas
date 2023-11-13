@extends('adminlte::page')

@section('title', 'Panel control Administrador')

@section('content_header')
<h1>Administrador Sucursales</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('sucursales')
        </div>
    </div>
</div>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('/css/admin_custom.css')}}">
@stop

@section('js')

<script type="text/javascript">
	window.livewire.on('closeModal', () => {
		$('#createDataModal').modal('hide');
	});
</script>
@stop
