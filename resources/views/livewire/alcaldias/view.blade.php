@section('title', __('Alcaldias'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Alcaldia Listing </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Alcaldias">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Add Alcaldias
						</div>
					</div>
				</div>

				<div class="card-body">
						@include('livewire.alcaldias.create')
						@include('livewire.alcaldias.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr>
								<td>#</td>
								<th>Nombre</th>
								<th>Telefono</th>
								<th>Correo</th>
								<th>Direccion</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($alcaldias as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->nombre }}</td>
								<td>{{ $row->telefono }}</td>
								<td>{{ $row->correo }}</td>
								<td>{{ $row->direccion }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{route('admin.alcaldia.image',[$row])}}" ><i class="fa fa-edit"></i> Imagenes </a>
                                        <a class="dropdown-item" href="{{route('admin.alcaldia.secciones.index',[$row])}}" ><i class="fa fa-edit"></i> Secciones </a>
									    <a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>
									    <a class="dropdown-item" onclick="confirm('Confirm Delete Alcaldia id {{$row->id}}? \nDeleted Alcaldias cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>
					{{ $alcaldias->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
