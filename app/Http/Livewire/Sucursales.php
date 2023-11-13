<?php

namespace App\Http\Livewire;

use App\Models\Dato;
use App\Models\Persona;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Sucursale;

class Sucursales extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $departamento, $nombre_sucursal, $direccion, $coordenadas, $responsable_id;
    public $updateMode = false;
    public $personas, $departamentos;

    public function mount()
    {
        $this->departamentos = Dato::where('tipo','departamentos')->pluck('valor','valor');
        $this->personas = Persona::all()->pluck('full_name', 'id');
    }

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.sucursales.view', [
            'sucursales' => Sucursale::latest()
						->orWhere('departamento', 'LIKE', $keyWord)
						->orWhere('nombre_sucursal', 'LIKE', $keyWord)
						->orWhere('direccion', 'LIKE', $keyWord)
						->orWhere('coordenadas', 'LIKE', $keyWord)
						->orWhere('responsable_id', 'LIKE', $keyWord)
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
		$this->departamento = null;
		$this->nombre_sucursal = null;
		$this->direccion = null;
		$this->coordenadas = null;
		$this->responsable_id = null;
    }

    public function store()
    {
        $this->validate([
		'departamento' => 'required',
		'nombre_sucursal' => 'required',
		'direccion' => 'required',
		'coordenadas' => 'required',
		'responsable_id' => 'required',
        ]);

        Sucursale::create([
			'departamento' => $this-> departamento,
			'nombre_sucursal' => $this-> nombre_sucursal,
			'direccion' => $this-> direccion,
			'coordenadas' => $this-> coordenadas,
			'responsable_id' => $this-> responsable_id
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Sucursale Successfully created.');
    }

    public function edit($id)
    {
        $record = Sucursale::findOrFail($id);

        $this->selected_id = $id;
		$this->departamento = $record-> departamento;
		$this->nombre_sucursal = $record-> nombre_sucursal;
		$this->direccion = $record-> direccion;
		$this->coordenadas = $record-> coordenadas;
		$this->responsable_id = $record-> responsable_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'departamento' => 'required',
		'nombre_sucursal' => 'required',
		'direccion' => 'required',
		'coordenadas' => 'required',
		'responsable_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Sucursale::find($this->selected_id);
            $record->update([
			'departamento' => $this-> departamento,
			'nombre_sucursal' => $this-> nombre_sucursal,
			'direccion' => $this-> direccion,
			'coordenadas' => $this-> coordenadas,
			'responsable_id' => $this-> responsable_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Sucursale Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Sucursale::where('id', $id);
            $record->delete();
        }
    }
}
