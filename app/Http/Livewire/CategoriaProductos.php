<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CategoriaProducto;
use App\Models\Dato;
use App\Models\Especy;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class CategoriaProductos extends Component
{
    use WithPagination, WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $marca, $especie, $logo, $new_image, $old_logo, $especie_id;
    public $updateMode = false;
    public $identificador, $especies;

    public function mount()
    {
        $this->identificador = rand();
        // $this->especies = Dato::where('tipo', 'especie')->get()->pluck('valor','valor');
        $this->especies = Especy::all()->pluck('nombre','id')->toArray();
    }

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.categoria_productos.view', [
            'categoriaProductos' => CategoriaProducto::with('miespecie')->latest()
						->orWhere('marca', 'LIKE', $keyWord)
						// ->orWhere('especie', 'LIKE', $keyWord)
						->orWhere('logo', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->resetInputEdit();
        $this->updateMode = false;
    }


    private function resetDatos()
    {
        $this->reset([
            'selected_id',
            'keyWord',
            'marca',
            'especie',
            'logo',
            'new_image',
            'old_logo',
            'especie_id',
        ]);
    }
    private function resetInput()
    {
		$this->marca = null;
		$this->especie = null;
		$this->logo = null;
    }

    private function resetInputEdit()
    {
        $this->new_image = null;
        $this->old_logo = null;
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
		'marca' => 'required',
		'especie' => 'required',
        'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $nombre_especie = $this->especies[$this->especie];
        $nombreImg = $this->guardarImg($this->logo, 'categorias');
        CategoriaProducto::create([
			'marca' => $this-> marca,
			'especie' => $nombre_especie,
			'logo' => $nombreImg,
            'especie_id' => $this->especie,
        ]);

        $this->resetDatos();
        $this->reset('logo');
        $this->identificador = rand();
		$this->emit('closeModal');
		session()->flash('message', 'Categoria Producto creado satisfactoriamente.');
    }

    public function edit($id)
    {
        $record = CategoriaProducto::findOrFail($id);
        // dd($record);
        $this->selected_id = $id;
        $this->especie_id = $record->especie_id;
		$this->marca = $record-> marca;
		$this->old_logo = $record-> logo;
        $this->updateMode = true;
    }

    public function update()
    {

        $this->validate([
            'marca' => 'required',
            'especie_id' => 'required|min:1',
            'new_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($this->selected_id) {
            $nombreImg = "";
            if($this->new_image != null){
                $nombreImg = $this->guardarImg($this->new_image, 'categorias');
                $this->borrarImagen($this->old_logo);
            }else{
                $nombreImg = $this->old_logo;
            }
            $nombre_especie = $this->especies[$this->especie_id];
			$record = CategoriaProducto::find($this->selected_id);
            $record->update([
			'marca' => $this->marca,
			'especie' => $nombre_especie,
			'logo' => $nombreImg,
			'especie_id' => $this->especie_id,
            ]);

            $this->resetDatos();
            $this->updateMode = false;
            $this->identificador = rand();
            $this->emit('closeModal');
            // $this->mount();
			session()->flash('message', 'Categoria Producto actualizado satisfactoriamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = CategoriaProducto::FindOrfail($id);
            $this->borrarImagen($record->logo);
            $record->delete();
        }
    }
}
