<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="tipo_video"></label>
                {!! Form::select('tipo_video', $tipo_videos, $tipo_video, ['class'=>'form-control', 'wire:model'=>'tipo_video', 'placeholder'=>'Tipo Video']) !!}
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
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Guardar</button>
            </div>
       </div>
    </div>
</div>
