<?php

namespace App\View\Components;

use App\Models\Especy;
use Illuminate\View\Component;

class CargarMenu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $menu;

    public function __construct()
    {
        $this->menu = Especy::where('activo',1)->select('id','nombre', 'codigo_svg', 'icono', 'usar_icono', 'name_ruta')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cargar-menu');
    }
}
