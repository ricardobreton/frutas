<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Dato;

class Datos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipo, $valor, $activo;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.datos.view', [
            'datos' => Dato::latest()
						->orWhere('tipo', 'LIKE', $keyWord)
						->orWhere('valor', 'LIKE', $keyWord)
						->orWhere('activo', 'LIKE', $keyWord)
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
		$this->valor = null;
		$this->activo = null;
    }

    public function store()
    {
        $this->validate([
		'tipo' => 'required',
		'valor' => 'required',
		'activo' => 'required',
        ]);

        Dato::create([ 
			'tipo' => $this-> tipo,
			'valor' => $this-> valor,
			'activo' => $this-> activo
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Dato Successfully created.');
    }

    public function edit($id)
    {
        $record = Dato::findOrFail($id);

        $this->selected_id = $id; 
		$this->tipo = $record-> tipo;
		$this->valor = $record-> valor;
		$this->activo = $record-> activo;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'tipo' => 'required',
		'valor' => 'required',
		'activo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Dato::find($this->selected_id);
            $record->update([ 
			'tipo' => $this-> tipo,
			'valor' => $this-> valor,
			'activo' => $this-> activo
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Dato Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Dato::where('id', $id);
            $record->delete();
        }
    }
}
