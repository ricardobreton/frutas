<?php

namespace App\Http\Livewire;

use App\Models\Alcaldia;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Video;

class Videos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipo_video, $preview, $ruta, $tipo_videos;
    public $updateMode = false;
    public $alcaldias, $alcaldiaId;

    public function mount()
    {
        $this->tipo_videos = [
            'Facebook' => 'Facebook',
            'Youtube' => 'Youtube',
        ];
        $this->alcaldias = Alcaldia::all()->pluck('nombre', 'id');
    }

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.videos.view', [
            'videos' => Video::latest()
						->orWhere('tipo_video', 'LIKE', $keyWord)
						->orWhere('preview', 'LIKE', $keyWord)
						->orWhere('ruta', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->tipo_video = null;
		$this->preview = null;
		$this->ruta = null;
        $this->alcaldiaId = null;
    }

    public function store()
    {
        $this->validate([
		'tipo_video' => 'required',
		'alcaldiaId' => 'required',
		'ruta' => 'required',
        ]);

        Video::create([
			'tipo_video' => $this-> tipo_video,
			'preview' => 'null',
			'alcaldia_id' => $this-> alcaldiaId,
			'ruta' => $this-> ruta
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Video creado.');
    }

    public function edit($id)
    {
        $record = Video::findOrFail($id);

        $this->selected_id = $id;
		$this->tipo_video = $record-> tipo_video;
		// $this->preview = $record-> preview;
		$this->ruta = $record-> ruta;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'tipo_video' => 'required',
		'alcaldiaId' => 'required',
		// 'preview' => 'required',
		'ruta' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Video::find($this->selected_id);
            $record->update([
			'tipo_video' => $this-> tipo_video,
			// 'preview' => $this-> preview,
			'alcaldia_id' => $this-> alcaldiaId,
			'ruta' => $this-> ruta
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Video actualizado.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Video::where('id', $id);
            $record->delete();
        }
    }
}
