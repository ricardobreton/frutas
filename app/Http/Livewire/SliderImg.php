<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;

class SliderImg extends Component
{
    public $producto;
    public $link_pre, $link_pos;

    public function render()
    {
        $this->buscarLinks();
        return view('livewire.slider-img');
    }
    public function back($producto_id)
    {
        $this->producto = Producto::findOrFail($producto_id);
        $this->buscarLinks();
    }

    public function next($producto_id)
    {
        $this->producto = Producto::findOrFail($producto_id);
        $this->buscarLinks();
    }
    public function buscarLinks()
    {
        $productos = Producto::where('categoria_id', $this->producto->categoria_id)->get();
        $primero = $productos->first();
        $ultimo = $productos->last();
        foreach ($productos as $key => $item) {
            $aux = $key;
            if($primero->id == $this->producto->id)
            {   //es el primero
                // dd('es el primero');
                $this->link_pre = $ultimo->id;
                $next = $productos->get(++$aux);
                $this->link_pos = $next->id;
                break;
            }
            if($ultimo->id == $this->producto->id)
            { //es el ultimo
                $aux = $productos->count()-2;
                $back = $productos->get($aux);
                $this->link_pre = $back->id;
                // dd($this->link_pre);
                $this->link_pos = $primero->id;
                break;
            }
            if($item->id == $this->producto->id)
            { //esta en el medio
                // dd("esta en el medio");
                $aux2 = $key;
                $back = $productos->get(--$aux);
                $next = $productos->get(++$aux2);
                $this->link_pre = $back->id;
                $this->link_pos = $next->id;
                break;
            }
        }
    }
}
