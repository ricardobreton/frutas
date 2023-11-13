@extends('adminlte::page')

@section('title', 'Gestionar alcaldias secciones')

@section('content_header')
    <h1>Secciones de la alcaldia {{$alcaldia->nombre}}</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif
    @livewire('secciones', ['alcaldia' => $alcaldia], key($alcaldia->id))
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript">
	window.livewire.on('closeModal', () => {
		$('#createDataModal').modal('hide');
	});
</script>
<script>
    $('.custom-file-input').on('change', function(event) {
        var inputFile = event.currentTarget;
        $(inputFile).parent()
            .find('.custom-file-label')
            .html(inputFile.files[0].name);
    });
</script>
@stop
