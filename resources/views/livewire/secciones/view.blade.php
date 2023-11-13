@section('title', __('Secciones'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Listado de Secciones </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Secciones">
						</div>
                        <div>
                            <a href="{{route('admin.alcaldia.secciones.create',[$alcaldia])}}" class="btn btn-sm btn-info" >
						        <i class="fa fa-plus"></i>  Nueva Secciones
                            </a>
                        </div>
					</div>
				</div>

				<div class="card-body">
						@include('livewire.secciones.create')
						@include('livewire.secciones.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr>
								<td>#</td>
								<th>Seccion</th>
								{{-- <th>Contenido</th> --}}
								<th>Alcaldia Id</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($secciones as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->seccion }}</td>
								{{-- <td>{{ substr($row->contenido, 0, 50) }}</td> --}}
								<td>{{ $row->alcaldia->nombre }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{route('admin.alcaldia.secciones.edit',[$row])}}" class="dropdown-item" >
                                            <i class="fa fa-edit"></i>  Edit
                                        </a>
									<a class="dropdown-item" onclick="confirm('Confirm Delete Seccione id {{$row->id}}? \nDeleted Secciones cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>
					{{ $secciones->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
