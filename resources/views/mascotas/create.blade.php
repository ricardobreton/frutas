@extends('adminlte::page')

@section('title', 'Mascotas')

@section('content_header')
<h1>Crear Mascota</h1>
@stop

@section('content')
@php
$config = [
    'format' => 'DD-MM-YYYY',
    'dayViewHeaderFormat' => 'MMM YYYY',
    // 'minDate' => "js:moment().startOf('month')",
    'maxDate' => "js:moment().endOf('day')",
    // 'daysOfWeekDisabled' => [0, 6],
    'locale' => 'es'
];
@endphp
<div class="col-sm-8 col-md-6">
    @include('partes.alertas')
    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="col-12 text-center p-3">
            @php
                $image_url = asset(Storage::url('mascotas/mascota.png'));
                if (isset($mascota)) {
                    $image_url = asset(Storage::url('mascotas/'.$mascota->foto));
                }
            @endphp
                <img class="profile-user-img img-fluid" src="{{$image_url}}"
                    alt="User profile picture" id="img-foto">
            </div>
            <form action="{{route('mascota.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                {!! Form::hidden('persona_id', Auth::user()->persona_id) !!}
                @include('mascotas.partials.campos')
                <br>
                <button type=submit
                    class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                    <span class="fas fa-user-lock"></span>
                    {{ 'Guardar' }}
                </button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

@stop

@section('css')
<link rel="stylesheet" href="{{asset('/css/admin_custom.css')}}">
@stop
@section('plugins.TempusDominusBs4', true)
@section('js')
    <script>
        function mostrar(){
        var archivo = document.getElementById("customFile").files[0];
        console.log(archivo);
        var reader = new FileReader();
        if (archivo) {
            reader.readAsDataURL(archivo );
            reader.onloadend = function () {
            document.getElementById("img-foto").src = reader.result;
            }
        }
        }
        $('.custom-file-input').on('change', function(event) {
            var inputFile = event.currentTarget;
            $(inputFile).parent()
                .find('.custom-file-label')
                .html(inputFile.files[0].name);
        });
    </script>
@stop
