<?php

namespace App\Http\Livewire;

use App\Models\Dato;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class Images extends Component
{
    use WithPagination, WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipo, $tiposImg, $url, $imageable_id, $imageable_type, $identificador;
    public $tipoImgSelected, $result;
    public $updateMode = false;

    public $alcaldia, $tipos;

    public function mount($alcaldia) {
        $this->identificador = rand();
        $this->alcaldia = $alcaldia;
        // $this->tipos = Dato::where('tipo', 'tipo')->get()->pluck('valor', 'valor');
        $this->tiposImg = Dato::where('tipo', 'tipo-img')->get()->pluck('valor', 'valor');
        // dd($this->tiposImg);
    }

    public function updatedTipoImgSelected($value)
    {
        // $this->emit('radioSelected', $value);
        $this->result = $value;//$this->tipoImgSelected;
        $this->tipos = Dato::where('tipo', $value)->get()->pluck('valor', 'valor');

    }

    public function render()
    {
        return view('livewire.images.view', [
            'images' => $this->alcaldia
                        ->allImages()
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
		$this->tipo = null;
		$this->url = null;
		$this->imageable_id = null;
		$this->imageable_type = null;
    }

    public function store()
    {
        $this->validate([
		'tipo' => 'required',
		'url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        $url = Storage::put('public/alcaldias', $this->url);
        $this->alcaldia->image()->create([
			'tipo' => $this-> tipo,
			'url' => $url,
        ]);

        $this->resetInput();
        $this->identificador = rand();
		$this->emit('closeModal');
		session()->flash('message', 'Image Successfully created.');
    }

    public function edit($id)
    {
        $record = Image::findOrFail($id);

        $this->selected_id = $id;
		$this->tipo = $record-> tipo;
		$this->url = $record-> url;
		$this->imageable_id = $record-> imageable_id;
		$this->imageable_type = $record-> imageable_type;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'tipo' => 'required',
		'url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
		// 'imageable_id' => 'required',
		// 'imageable_type' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Image::find($this->selected_id);
            $record->update([
			'tipo' => $this-> tipo,
			'url' => $this-> url,
			'imageable_id' => $this-> imageable_id,
			'imageable_type' => $this-> imageable_type
            ]);

            $this->resetInput();
            $this->identificador = rand();
            $this->updateMode = false;
			session()->flash('message', 'Image Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Image::where('id', $id);
            $record->delete();
        }
    }

    public function guardarImg($file, $carpeta)
    {
        $fecha = new \Carbon\Carbon();
        $name_img = $fecha->format('dmy_hms').rand();
        $ext_image = $file->extension();
        return $file->storeAs("public/".$carpeta,$name_img.'.'.$ext_image);
    }
    public function borrarImagen($ruta_name)
    {
        $ruta_name = str_replace('public/','',$ruta_name);
        $destination = public_path('storage\\'.$ruta_name);
        if(File::exists($destination)){
            session()->flash('message', 'Archivo Borrado.');
            File::delete($destination);
        }
    }
}
