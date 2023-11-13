<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create Nuevo Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="alcaldia">Alcaldias</label>
                        @isset($alcaldias)
                            {!! Form::select('tipo', $alcaldias, null, ['class'=>'form-control','wire:model'=>'alcaldiaId','placeholder'=>'Seleccione una alcaldia']) !!}
                        @endisset
                        @error('tipo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
            <div class="form-group">
                <label for="tipo_video"></label>
                {!! Form::select('tipo_video', $tipo_videos, null, ['class'=>'form-control', 'wire:model'=>'tipo_video', 'placeholder'=>'Tipo Video']) !!}
                {{-- <input wire:model="tipo_video" type="text" class="form-control" id="tipo_video" placeholder="Tipo Video"> --}}
                @error('tipo_video') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            {{-- <div class="form-group">
                <label for="preview"></label>
                <input wire:model="preview" type="text" class="form-control" id="preview" placeholder="Preview">@error('preview') <span class="error text-danger">{{ $message }}</span> @enderror
            </div> --}}
            <div>
                @if (!is_null($ruta))
                    @if ($tipo_video == 'Facebook')
                        <x-video_facebook ruta="{{$ruta}}"></x-video_facebook>
                    @endif
                    @if ($tipo_video == 'Youtube')
                        <x-video_youtube ruta="{{$ruta}}"></x-video_youtube>
                    @endif
                @endif
            </div>
            <div class="form-group">
                <label for="ruta"></label>
                <input wire:model="ruta" type="text" class="form-control" id="ruta" placeholder="Ruta">@error('ruta') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
