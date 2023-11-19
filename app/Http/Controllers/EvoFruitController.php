<?php

namespace App\Http\Controllers;

use App\Models\Alcaldia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EvoFruitController extends Controller
{
    public function index()
    {
        $alcaldias =  Alcaldia::all();
        return view('theme.evofruit.index')->with(compact('alcaldias'));
    }

    public function alcaldias($alcaldia)
    {
        $alcaldia = Alcaldia::where('nombre', $alcaldia)->first();
        $galeria = $alcaldia->imagenes('galeria')->get();
        $header = $alcaldia->imagenes('cabecera')->first();
        $footer = $alcaldia->imagenes('pie')->first();
        $videos = $alcaldia->videos()->get();
        $secciones = $alcaldia->secciones()->get();
        // dd($secciones);
        return view('theme.evofruit.alcaldias')->with(compact('alcaldia','galeria', 'header','footer', 'videos', 'secciones'));
    }
    public function reindex($slug){
        $alcaldia = Alcaldia::where('nombre',$slug)->first();
        if($alcaldia){
            // return redirect()->route('alcaldia.show',['alcaldia' => $slug]);
            // Construir la URL completa con el nuevo esquema (HTTPS)
            $nuevaUrl = secure_url(route('alcaldia.show',['alcaldia' => $slug]));
            // Redirigir a la nueva URL
            return Redirect::to($nuevaUrl);
        }
        return redirect()->route('inicio');
    }
}
