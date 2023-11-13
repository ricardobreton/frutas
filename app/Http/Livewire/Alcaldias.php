<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Alcaldia;

class Alcaldias extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $telefono, $correo, $direccion;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.alcaldias.view', [
            'alcaldias' => Alcaldia::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('telefono', 'LIKE', $keyWord)
						->orWhere('correo', 'LIKE', $keyWord)
						->orWhere('direccion', 'LIKE', $keyWord)
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
		$this->nombre = null;
		$this->telefono = null;
		$this->correo = null;
		$this->direccion = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        Alcaldia::create([ 
			'nombre' => $this-> nombre,
			'telefono' => $this-> telefono,
			'correo' => $this-> correo,
			'direccion' => $this-> direccion
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Alcaldia Successfully created.');
    }

    public function edit($id)
    {
        $record = Alcaldia::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->telefono = $record-> telefono;
		$this->correo = $record-> correo;
		$this->direccion = $record-> direccion;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Alcaldia::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'telefono' => $this-> telefono,
			'correo' => $this-> correo,
			'direccion' => $this-> direccion
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Alcaldia Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Alcaldia::where('id', $id);
            $record->delete();
        }
    }
}
