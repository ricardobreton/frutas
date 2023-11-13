@extends('adminlte::page')

@section('title', 'Backup')

@section('content_header')
    <h1>Gestión de Seguridad</h1>
@stop

@section('content')
<!-- Default box -->
<div class="box">
  <div class="box-body">
    <button id="create-new-backup-button" href="{{ asset('backup/create') }}" class="btn btn-xs btn-primary ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> Crear una copia de seguridad </span></button>
    <br>
    <h5 class="mt-4">Copias de seguridad existentes:</h5>
    <table class="table table-hover table-condensed">
      <thead>
        <tr>
          <th>#</th>
          <th>Ubicación</th>
          <th>Fecha</th>
          <th class="text-right">Tamaño del fichero</th>
          <th class="text-right">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($backups as $k => $b)
        <tr>
          <th scope="row">{{ $k+1 }}</th>
          <td>{{ $b['disk'] }}</td>
          <td>{{ \Carbon\Carbon::createFromTimeStamp($b['last_modified'])->formatLocalized('%d %B %Y, %H:%M') }}</td>
          <td class="text-right">{{ round((int)$b['file_size']/1048576, 2).' MB' }}</td>
          <td class="text-right">
              @if ($b['download'])
              <a class="btn btn-xs btn-default"
              href="{{ asset('/backup/download/') }}?disk={{ $b['disk'] }}&path={{ urlencode($b['file_path']) }}&file_name={{ urlencode($b['file_name']) }}">
              <i class="fa fa-cloud-download"></i>
              Descargar</a>
              @endif
              <a class="btn btn-xs btn-danger" data-button-type="delete"
              href="{{ asset('/backup/delete')}}" file_name="{{$b['file_name']}}" disk="{{ $b['disk'] }}">
              <i class="fa fa-trash-o"></i>
              Eliminar</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div><!-- /.box-body -->
</div><!-- /.box -->
@stop

@section('css')
  <link rel="stylesheet" href="{{asset('/css/admin_custom.css')}}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/ladda-themeless.min.css" rel="stylesheet" type="text/css" />
@stop

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/spin.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Ladda/1.0.6/ladda.min.js"></script>
<script>
  jQuery(document).ready(function($) {
    // capture the Create new backup button
    $("#create-new-backup-button").click(function(e) {
        e.preventDefault();
        var create_backup_url = $(this).attr('href');
        // console.log(create_backup_url);
        // Create a new instance of ladda for the specified button
        var l = Ladda.create( document.querySelector( '#create-new-backup-button' ) );

        // Start loading
        l.start();

        // Will display a progress bar for 10% of the button width
        l.setProgress( 0.3 );

        setTimeout(function(){ l.setProgress( 0.6 ); }, 2000);

        // do the backup through ajax
        $.ajax({
                url: create_backup_url,
                type: 'PUT',
                data: {
                      "_token": "{{ csrf_token() }}",
                      },
                success: function(result) {
                    // console.log(result);
                    l.setProgress( 0.9 );
                    // Show an alert with the result
                    if (result.indexOf('failed') >= 0) {
                        toastr.warning('Estamos presentando problemas. <br> La copia de seguridad puede que no se haya realizado. Por favor verifica los logs para más detalles.')
                    }
                    else
                    {
                        // toastr["success"]("Recargando la página en 3 segundos.", "Se ha completado la copia de seguridad");
                        toastr.success('Se ha completado la copia de seguridad. <br> Recargando la página en 3 segundos')
                    }

                    // Stop loading
                    l.setProgress( 1 );
                    l.stop();

                    // refresh the page to show the new file
                    setTimeout(function(){ location.reload(); }, 3000);
                },
                error: function(result) {
                    l.setProgress( 0.9 );
                    // Show an alert with the result
                    toastr.warning('Error al realizar la copia de seguridad. <br> La copia de seguridad NO se pudo crear.');
                    // Stop loading
                    l.stop();
                }
            });
    });

    // capture the delete button
    $("[data-button-type=delete]").click(function(e) {
        e.preventDefault();
        var delete_button = $(this);
        var delete_url = $(this).attr('href');
        var file_name = $(this).attr('file_name');
        var disk = $(this).attr('disk');
        if (confirm("¿Estás seguro que quieres borrar esta copia de seguridad?") == true) {
            $.ajax({
                type: 'DELETE',
                url: delete_url,
                data: {
                      "_token": "{{ csrf_token() }}",
                      "file_name" : file_name,
                      "disk" : disk,
                      },
                success: function(result) {
                    // Show an alert with the result
                    toastr.success('Confirmado. <br> La copia de seguridad fue eliminada.')
                    // delete the row from the table
                    delete_button.parentsUntil('tr').parent().remove();
                },
                error: function(result) {
                    // Show an alert with the result
                    toastr.warning('Ups, ha ocurrido un error. <br> La copia de seguridad NO se pudo eliminar.');

                }
            });
        } else {
            toastr.info('La operación ha sido cancelada. <br> La copia de seguridad NO se pudo eliminar.');
        }
      });

  });
</script>
@stop
@section('plugins.Toastr', true)