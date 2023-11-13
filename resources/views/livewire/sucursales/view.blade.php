@section('title', __('Sucursales'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Lista de Sucursales </h4>
						</div>
						{{-- <div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div> --}}
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Sucursales">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Añadir Sucursal
						</div>
					</div>
				</div>

				<div class="card-body">
						@include('livewire.sucursales.create')
						@include('livewire.sucursales.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr>
								<td>#</td>
								<th>Departamento</th>
								<th>Nombre Sucursal</th>
								<th>Dirección</th>
								<th>Coordenadas</th>
								<th>Responsable</th>
								<td>ACCION</td>
							</tr>
						</thead>
						<tbody>
							@foreach($sucursales as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->departamento }}</td>
								<td>{{ $row->nombre_sucursal }}</td>
								<td>{{ $row->direccion }}</td>
								<td>{{ $row->coordenadas }}</td>
								<td>{{ $row->persona->full_name }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>
									<a class="dropdown-item" onclick="confirm('Confirma que borrar la  Sucursal {{$row->nombre_sucursal}}? \nUna vez eliminado no se podra recuperar!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>
					{{ $sucursales->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
