<?php

namespace App\Http\Livewire\Contacto;

use Livewire\Component;

class SelectDepartamento extends Component
{
    public $departamentos, $departamento;

    public function seleccionarDepartamento()
    {
        $this->emit('selectSucursal', $this->departamento);
    }

    public function render()
    {
        return view('livewire.contacto.select-departamento');
    }
}
