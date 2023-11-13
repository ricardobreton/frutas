@section('title', __('Carrusels'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Listado de imagenes carrusel </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="buscar imagen carrusel">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Añadir imagen Carrusel
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.carrusels.create')
						@include('livewire.carrusels.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Nombre</th>
								<th>Descripción</th>
								<th>Imagen</th>
								<th>Orden</th>
								<th>Activa</th>
								<th>Especie</th>
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@foreach($carrusels as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->nombre }}</td>
								<td>{{ $row->descripcion }}</td>
								<td>
									<div class="col-12 text-center p-3">
                                        <img class="profile-user-img img-fluid" src="{{asset(Storage::url($row->url_imagen))}}" alt="imagen carrucel" id="carrusel{{$row->orden}}">
                                    </div>
								</td>
								<td>{{ $row->orden }}</td>
								<td>{{ $row->activa?'Si':'No' }}</td>
								<td>{{ $row->miespecie->nombre }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
									<a class="dropdown-item" onclick="confirm('Confirma que realmente desea eleiminar el archivo? \nUna vez borrado no se podra recuperar!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $carrusels->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
