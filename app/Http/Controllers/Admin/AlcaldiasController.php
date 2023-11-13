<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alcaldia;
use Illuminate\Http\Request;

class AlcaldiasController extends Controller
{
    function alcaldiasImagenes(Alcaldia $alcaldia) {
        return view('admin.alcaldias.imagenes')->with(compact('alcaldia'));
    }
    function alcaldiasSecciones(Alcaldia $alcaldia) {
        // dd($alcaldia);
        return view('admin.alcaldias.secciones')->with(compact('alcaldia'));
    }
}
