<?php

namespace App\View\Components;

use Illuminate\View\Component;

class video_youtube extends Component
{
    public $ruta;

    public function __construct($ruta)
    {
        $this->ruta = $ruta;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.video_youtube');
    }
}
