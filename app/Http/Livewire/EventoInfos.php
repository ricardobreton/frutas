<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EventoInfo;

class EventoInfos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $mas_info, $evento_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.evento_info.view', [
            'eventoInfos' => EventoInfo::latest()
						->orWhere('mas_info', 'LIKE', $keyWord)
						->orWhere('evento_id', 'LIKE', $keyWord)
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
		$this->mas_info = null;
		$this->evento_id = null;
    }

    public function store()
    {
        $this->validate([
		'mas_info' => 'required',
		'evento_id' => 'required',
        ]);

        EventoInfo::create([
			'mas_info' => $this-> mas_info,
			'evento_id' => $this-> evento_id
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'EventoInfo Successfully created.');
    }

    public function edit($id)
    {
        $record = EventoInfo::findOrFail($id);

        $this->selected_id = $id;
		$this->mas_info = $record-> mas_info;
		$this->evento_id = $record-> evento_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'mas_info' => 'required',
		'evento_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = EventoInfo::find($this->selected_id);
            $record->update([
			'mas_info' => $this-> mas_info,
			'evento_id' => $this-> evento_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'EventoInfo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = EventoInfo::where('id', $id);
            $record->delete();
        }
    }
}
