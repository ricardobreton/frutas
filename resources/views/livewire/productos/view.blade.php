@section('title', __('Productos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Lista Productos </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Productos">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Añadir Productos
						</div>
					</div>
				</div>

				<div class="card-body">
						@include('livewire.productos.create')
						@include('livewire.productos.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr>
								<td>#</td>
								<th>Nombre Producto</th>
								<th>Descripción</th>
								<th>Img Producto</th>
								<th>Img Datos</th>
								<th>Categoria Id</th>
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@foreach($productos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->nombre_producto }}</td>
								<td>{{ $row->descripcion_producto }}</td>
								<td>
                                    <div class="col-12 text-center p-3">
                                        <img class="profile-user-img img-fluid" src="{{asset(Storage::url($row->img_producto))}}" alt="producto" id="img-foto">
                                    </div>
                                </td>
								<td>
                                    @if ($row->img_datos != '')
                                        <div class="col-12 text-center p-3">
                                            <img class="profile-user-img img-fluid" src="{{asset(Storage::url($row->img_datos))}}" alt="datos nutricionales" id="img-foto">
                                        </div>
                                    @endif
                                </td>
								<td>{{ $row->categoria->marca }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>
									<a class="dropdown-item" onclick="confirm('Confirma que desea eliminar el registro? \nUna vez eliminado no se prodra recuperar!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>
					{{ $productos->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
