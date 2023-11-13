<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Especy;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;


class Especies extends Component
{
    use WithPagination, WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $codigo_svg, $icono, $activo, $usar_icono,$update_icono;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.especies.view', [
            'especies' => Especy::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('codigo_svg', 'LIKE', $keyWord)
						->orWhere('icono', 'LIKE', $keyWord)
						->orWhere('activo', 'LIKE', $keyWord)
						->orWhere('usar_icono', 'LIKE', $keyWord)
						->paginate(10),
        ]);
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
        //quitar public
        $ruta_name = str_replace('public/','',$ruta_name);
        $destination = public_path('storage\\'.$ruta_name);
        if(File::exists($destination)){
            session()->flash('message', 'Archivo Borrado.');
            File::delete($destination);
            // Storage::delete('public/'.$ruta_name);
        }
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->nombre = null;
		$this->codigo_svg = null;
		$this->icono = null;
		$this->activo = null;
		$this->usar_icono = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		// 'activo' => 'required',
		// 'usar_icono' => 'required',
        ]);
        $activo = ($this->activo)?1:0;
        $usar_icono = ($this->usar_icono)?1:0;
        $nombre_icono = '';
        if(isset($this->icono)){
            $nombre_icono = $this->guardarImg($this->icono, 'nemu-animal');
        }
        Especy::create([
			'nombre' => $this-> nombre,
			'codigo_svg' => $this-> codigo_svg,
			'icono' => $nombre_icono,
			'activo' => $activo,
			'usar_icono' => $usar_icono
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Especia creada satisfactoriamente.');
    }

    public function edit($id)
    {
        $record = Especy::findOrFail($id);

        $this->selected_id = $id;
		$this->nombre = $record-> nombre;
		$this->codigo_svg = $record-> codigo_svg;
		$this->icono = $record-> icono;
		$this->activo = $record-> activo;
		$this->usar_icono = $record-> usar_icono;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'activo' => 'required',
		'usar_icono' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Especy::find($this->selected_id);
            $nombre_new_icono = $this->icono;
            if($this->update_icono != null){
                $nombre_new_icono = $this->guardarImg($this->update_icono, 'nemu-animal');
                $this->borrarImagen($this->icono);
            }
            $record->update([
			'nombre' => $this-> nombre,
			'codigo_svg' => $this-> codigo_svg,
			'icono' => $nombre_new_icono,
			'activo' => $this-> activo,
			'usar_icono' => $this-> usar_icono
            ]);

            $this->resetInput();
            $this->reset(['update_icono']);
            $this->updateMode = false;
			session()->flash('message', 'Especie actualizada satisfactoriamente.');
            session()->forget('menu');
            $menu = Especy::where('activo',1)->select('id','nombre', 'codigo_svg', 'icono', 'usar_icono', 'name_ruta')->get();
            session(['menu' => $menu]);
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Especy::where('id', $id);
            $record->delete();
        }
    }
}
