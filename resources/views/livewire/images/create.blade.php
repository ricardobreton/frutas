<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create Nueva Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label class="d-block">Seleccione Tipo de imagen</label>
                        @forelse ($tiposImg as $tipoImg)
                            <input type="radio" wire:model="tipoImgSelected" value="{{$tipoImg}}" > {{$tipoImg}}
                        @empty
                            <p>Sin datos</p>
                        @endforelse
                    </div>
            <div class="form-group">
                <label for="tipo">{{$result}}</label>
                @isset($tipos)
                    {!! Form::select('tipo', $tipos, null, ['class'=>'form-control','wire:model'=>'tipo','placeholder'=>'Tipo Imagen']) !!}
                @endisset
                @error('tipo') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            {{-- <div class="form-group">
                <label for="url"></label>
                <input wire:model="url" type="text" class="form-control" id="url" placeholder="Url">@error('url') <span class="error text-danger">{{ $message }}</span> @enderror
            </div> --}}
            <div wire:loading  wire:target="url" class="alert alert-warning alert-dismissible">
                <h5><i class="icon fas fa-exclamation-triangle"></i> Imagen Cargando!</h5>
                Espere un momento hasta que la imagen se haya procesado.
            </div>
            <div class="col-12 text-center p-3">
                @if ($url!=null)
                    <img class="profile-user-img img-fluid" src="{{$url->temporaryUrl()}}" alt="url marca producto" id="img-foto">
                @endif
            </div>
            <div class="form-group">
                <!-- <label for="customFile">Custom File</label> -->
                <div class="custom-file">
                    <input wire:model="url" type="file" class="custom-file-input" id="customFile{{$identificador}}" name="url" accept="image/*">
                    <label wire:ignore class="custom-file-label" for="customFile">Cargar Imagen</label>
                </div>
                @error('url')
                <div class="text-danger small m-1">{{ $message }}</div>
                @enderror
            </div>
            {{-- <div class="form-group">
                <label for="imageable_id"></label>
                <input wire:model="imageable_id" type="text" class="form-control" id="imageable_id" placeholder="Imageable Id">@error('imageable_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="imageable_type"></label>
                <input wire:model="imageable_type" type="text" class="form-control" id="imageable_type" placeholder="Imageable Type">@error('imageable_type') <span class="error text-danger">{{ $message }}</span> @enderror
            </div> --}}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
