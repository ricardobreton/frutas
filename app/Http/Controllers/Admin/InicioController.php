<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carrusel;
use App\Models\CategoriaProducto;
use App\Models\Especy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InicioController extends Controller
{
    public function inicio()
    {
        $carrusel = Carrusel::with('miespecie')->where('activa','1')->get();
        $especies = Especy::join('carrusel', 'especies.id', '=', 'carrusel.especie_id')
                          ->select('especies.id','especies.nombre')
                          ->pluck('id','nombre')->toArray();
        $logos = [];
        foreach ($especies as $especie => $id) {
            $producto = DB::table('categoria_productos as cp')
                            ->join('productos as p', 'cp.id', '=', 'p.categoria_id')
                            ->select('p.id as producto_id', 'cp.marca')
                            ->where('especie_id', '=', 1)
                            ->limit(1)
                            ->pluck('producto_id')->toArray();
                            // ->get()->toArray();
            // dd($producto);
            $listaLogos = CategoriaProducto::where('especie_id', $id)
                                            ->select('logo')
                                            // ->get();
                                            ->pluck('logo')
                                            ->toArray();
            $logos[$especie] = ['listaLogos' =>$listaLogos,'producto_id' => $producto[0],'especie_id' => $id];
        }
        // dd($logos);
        $especiesRutas = Especy::select('id','name_ruta')->pluck('name_ruta', 'id')->toArray();
        // dd($especiesRutas);
        return view('theme.proanisrl.index')->with(compact('carrusel','logos','especiesRutas'));
    }
}
