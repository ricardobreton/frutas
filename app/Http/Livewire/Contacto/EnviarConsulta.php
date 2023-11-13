<?php

namespace App\Http\Livewire\Contacto;

use App\Models\Sucursale;
use Livewire\Component;

class EnviarConsulta extends Component
{

    public $sucursal,$especie,$edad,$medida,$fases,$consulta,$mensaje,$link;
    protected $listeners = ['enviarConsulta'];

    function mount(){
        $this->sucursal = Sucursale::with('persona')->where('departamento', 'Santa Cruz')->first();
    }

    public function render()
    {
        return view('livewire.contacto.enviar-consulta');
    }

    public function enviarConsulta($sucursal_id)
    {
        $this->sucursal = Sucursale::with('persona')->findOrFail($sucursal_id);
    }

    public function enviarWhatsapp()
    {
        $this->mensaje = 'especie: '. $this->especie. ' edad: '.$this->edad.' medida: '.$this->medida. ' fases: ' .$this->fases.' Consulta: '.$this->consulta;
        $this->link = 'https://api.whatsapp.com/send?phone='. $this->sucursal->persona->telefonos .'&text='.$this->mensaje;
        $this->emit('abrirLink', $this->link);
    }
}
