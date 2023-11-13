@section('title', __('Especys'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Lista de especies</h4>
						</div>
						{{-- <div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div> --}}
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Especies">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Añadir Especie
						</div>
					</div>
				</div>

				<div class="card-body">
						@include('livewire.especies.create')
						@include('livewire.especies.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr>
								<td>#</td>
								<th>Nombre</th>
								<th>Icono SVG</th>
								<th>Icono PNG</th>
								<th>Activo</th>
								<th>Usar PNG</th>
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@foreach($especies as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->nombre }}</td>
								<td>
                                    <div class="icon_animal">
                                        {!! $row->codigo_svg !!}</td>
                                    </div>
								<td>
                                    @if ($row->icono)
                                        <div class="icon_animal text-center p-3">
                                            <img class="img100 img-fluid" style="width: 50px" src="{{asset(Storage::url($row->icono))}}" alt="Icono menu" id="icono">
                                        </div>
                                    @endif
                                </td>
								<td>{{ $row->activo==1?'Si':'No' }}</td>
								<td>{{ $row->usar_icono==1?'Si':'No' }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>
									<a class="dropdown-item" onclick="confirm('Confirma que quiere eleminar la especie {{$row->nombre}}? \nUna vez borrado no podra ser recuperado!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>
					{{ $especies->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
