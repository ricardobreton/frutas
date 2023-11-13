@section('title', __('Eventos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Lista de Eventos </h4>
						</div>
						{{-- <div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div> --}}
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Eventos">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Añadir Evento
						</div>
					</div>
				</div>

				<div class="card-body" style="min-height: 200px">
						@include('livewire.eventos.create')
						@include('livewire.eventos.update')
				<div class="table-responsive" style="min-height: 200px">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr>
								<td>#</td>
								<th>Tipo Evento</th>
								<th>Título</th>
								<th>Foto Evento</th>
								<th>Descripción</th>
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@foreach($eventos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->tipo_evento }}</td>
								<td>{{ $row->titulo }}</td>
								<td>
                                    @if ($row->foto_evento != '')
                                    <div class="col-12 text-center p-3">
                                        <img class="profile-user-img img-fluid" src="{{asset(Storage::url($row->foto_evento))}}" alt="Logo marca producto" id="img-foto">
                                    </div>
                                    @endif
                                </td>
								<td>{{ $row->descripcion }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{route('admin.evento.info',[$row->id])}}"><i class="fas fa-info"></i> MásInfo </a>
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>
									<a class="dropdown-item" onclick="confirm('Confirma que borrara el Evento id {{$row->id}}? \nDeleted Eventos cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>
					{{ $eventos->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
