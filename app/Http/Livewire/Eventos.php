<?php

namespace App\Http\Livewire;

use App\Models\Dato;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Evento;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;

class Eventos extends Component
{
    use WithPagination, WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipo_evento, $titulo, $foto_evento,$new_foto_evento,$old_foto_evento, $descripcion;
    public $updateMode = false;
    public $identificador,$dato_eventos;

    public function mount()
    {
        $this->identificador = rand();
        $this->dato_eventos = Dato::where('tipo', 'eventos')->get()->pluck('valor','valor');
    }

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.eventos.view', [
            'eventos' => Evento::latest()
						->orWhere('tipo_evento', 'LIKE', $keyWord)
						->orWhere('titulo', 'LIKE', $keyWord)
						->orWhere('foto_evento', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
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
        $ruta_name = str_replace('public/','',$ruta_name);
        $destination = public_path('storage\\'.$ruta_name);
        if(File::exists($destination)){
            session()->flash('message', 'Archivo Borrado.');
            File::delete($destination);
        }
    }

    public function cancel()
    {
        $this->resetDatos();
        $this->updateMode = false;
    }
    public function resetDatos()
    {
        $this->reset([
            'tipo_evento',
            'titulo',
            'foto_evento',
            'descripcion',
            'new_foto_evento',
            'old_foto_evento',
        ]);

    }

    public function store()
    {
        $this->validate([
		'tipo_evento' => 'required',
		'titulo' => 'required',
		'foto_evento' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		'descripcion' => 'required|max:250',
        ]);
        $nombreImg = $this->guardarImg($this->foto_evento, 'eventos');
        Evento::create([
			'tipo_evento' => $this-> tipo_evento,
			'titulo' => $this-> titulo,
			'foto_evento' => $nombreImg,
			'descripcion' => $this-> descripcion
        ]);

        $this->resetDatos();
        $this->identificador = rand();
		$this->emit('closeModal');
		session()->flash('message', 'Evento creado exisotsamente.');
    }

    public function edit($id)
    {
        $record = Evento::findOrFail($id);

        $this->selected_id = $id;
		$this->tipo_evento = $record-> tipo_evento;
		$this->titulo = $record-> titulo;
		$this->old_foto_evento = $record-> foto_evento;
		$this->descripcion = $record-> descripcion;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'tipo_evento' => 'required',
		'titulo' => 'required',
		'new_foto_evento' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		'descripcion' => 'required',
        ]);

        if ($this->selected_id) {
            $nombreImg = "";
            if($this->new_foto_evento != null){
                $nombreImg = $this->guardarImg($this->new_foto_evento, 'categorias');
                $this->borrarImagen($this->old_foto_evento);
            }else{
                $nombreImg = $this->old_foto_evento;
            }
			$record = Evento::find($this->selected_id);
            $record->update([
			'tipo_evento' => $this-> tipo_evento,
			'titulo' => $this-> titulo,
			'foto_evento' => $nombreImg,
			'descripcion' => $this-> descripcion
            ]);

            $this->resetDatos();
            $this->identificador = rand();
            $this->updateMode = false;
			session()->flash('message', 'Evento actualizado exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Evento::FindOrfail($id);
            $this->borrarImagen($record->foto_evento);
            $record->delete();
        }
    }
}
