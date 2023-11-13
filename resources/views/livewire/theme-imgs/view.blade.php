@section('title', __('Theme Imgs'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Lista de imagenes </h4>
						</div>
						<div wire:poll.60s>
							{{-- <code><h5>{{ now()->format('H:i:s') }} UTC</h5></code> --}}
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar imagenes">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Añadir nueva imagen
						</div>
					</div>
				</div>

				<div class="card-body">
						@include('livewire.theme-imgs.create')
						@include('livewire.theme-imgs.update')
				<div class="table-responsive">

					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr>
								<td>#</td>
								<th>Seccion</th>
								<th>Imagen</th>
								<th>Especie</th>
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@foreach($themeImgs as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->seccion }}</td>
								<td>
                                    <div class="col-12 text-center p-3">
                                            <img class="profile-user-img img-fluid" src="{{Storage::url($row->ruta_img)}}" alt="ruta_img" id="img-foto">
                                    </div>
                                </td>
								<td>{{ $row->especie->nombre }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>
									<a class="dropdown-item" onclick="confirm('Confirma que desea borrar el archivo? \nUna vez borrado no podra recuperarlo!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>
					{{ $themeImgs->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
