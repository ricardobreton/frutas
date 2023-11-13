<?php

namespace App\Http\Livewire;

use App\Models\Alcaldia;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Seccione;

class Secciones extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $seccion, $contenido, $alcaldia_id;
    public $updateMode = false;
    public $alcaldia;

    public function mount(Alcaldia $alcaldia){
        // dd($alcaldia);
        $this->alcaldia = $alcaldia;
    }

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.secciones.view', [
            'secciones' => Seccione::latest()
						->where('alcaldia_id', $this->alcaldia->id)
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
		$this->contenido = null;
		$this->alcaldia_id = null;
    }

    public function store()
    {
        $this->validate([
		'seccion' => 'required',
		'contenido' => 'required',
		'alcaldia_id' => 'required',
        ]);

        Seccione::create([
			'seccion' => $this-> seccion,
			'contenido' => $this-> contenido,
			'alcaldia_id' => $this-> alcaldia_id
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Seccione Successfully created.');
    }

    public function edit($id)
    {
        $record = Seccione::findOrFail($id);

        $this->selected_id = $id;
		$this->seccion = $record-> seccion;
		$this->contenido = $record-> contenido;
		$this->alcaldia_id = $record-> alcaldia_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'seccion' => 'required',
		'contenido' => 'required',
		'alcaldia_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Seccione::find($this->selected_id);
            $record->update([
			'seccion' => $this-> seccion,
			'contenido' => $this-> contenido,
			'alcaldia_id' => $this-> alcaldia_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Seccione Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Seccione::where('id', $id);
            $record->delete();
        }
    }
}
