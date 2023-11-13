<?php

namespace App\Http\Livewire;

use App\Models\CategoriaProducto;
use App\Models\Dato;
use App\Models\Especy;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ThemeImg;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;

class ThemeImgs extends Component
{
    use WithPagination, WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $seccion, $ruta_img, $especie_id;
    public $updateMode = false;
    public $especies,$seccion_img, $new_image;

    public function mount()
    {
        $this->especies = Especy::where('name_ruta', 'generico')->get()->pluck('nombre','id');
        $this->seccion_img = Dato::where('tipo','seccion_img')->get()->pluck('valor','valor');
    }
    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.theme-imgs.view', [
            'themeImgs' => ThemeImg::latest()
						->orWhere('seccion', 'LIKE', $keyWord)
						->orWhere('ruta_img', 'LIKE', $keyWord)
						->orWhere('especie_id', 'LIKE', $keyWord)
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
		$this->seccion = null;
		$this->ruta_img = null;
		$this->especie_id = null;
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

    public function store()
    {
        $this->validate([
		'seccion' => 'required',
		'ruta_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		'especie_id' => 'required',
        ]);
        $nombreImg = $this->guardarImg($this->ruta_img, 'paginas');
        ThemeImg::create([
			'seccion' => $this->seccion,
			'ruta_img' => $nombreImg,
			'especie_id' => $this->especie_id
        ]);

        $this->resetInput();
        $this->reset('ruta_img');
		$this->emit('closeModal');
		session()->flash('message', 'Secci+on creada satisfactoriamente.');
    }

    public function edit($id)
    {
        $record = ThemeImg::findOrFail($id);

        $this->selected_id = $id;
		$this->seccion = $record-> seccion;
		$this->ruta_img = $record-> ruta_img;
		$this->especie_id = $record-> especie_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'seccion' => 'required',
		'ruta_img' => 'required',
		'especie_id' => 'required',
        ]);

        if ($this->selected_id) {
            if($this->new_image != null){
                $nombreImg = $this->guardarImg($this->new_image, 'paginas');
                $this->borrarImagen($this->ruta_img);
            }else{
                $nombreImg = $this->ruta_img;
            }
			$record = ThemeImg::find($this->selected_id);
            $record->update([
			'seccion' => $this-> seccion,
			'ruta_img' => $nombreImg,
			'especie_id' => $this-> especie_id
            ]);

            $this->resetInput();
            $this->reset('new_image');
            $this->updateMode = false;
			session()->flash('message', 'La imagenen a sido actualizada correctamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = ThemeImg::FindOrfail($id);
            $this->borrarImagen($record->ruta_img);
            $record->delete();
        }
    }
}
