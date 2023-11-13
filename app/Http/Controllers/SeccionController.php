<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeccionRequest;
use App\Models\Alcaldia;
use App\Models\Dato;
use App\Models\Seccione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SeccionController extends Controller
{

    public function create(Alcaldia $alcaldia)
    {
        // dd($alcaldia);
        $secciones = Dato::where('tipo', 'seccion')->get()->pluck('valor', 'valor');
        return view('admin.alcaldias.seccion.create')->with(compact('alcaldia','secciones'));
    }

    public function store(SeccionRequest $request)
    {
        // dd($request->all());
        $seccion = Seccione::create($request->all());
        if ($request->file('file')) {
            $url = Storage::put('public/secciones', $request->file('file'));
            // dd($url);
            $seccion->image()->create([
                'tipo' => $seccion->seccion,
                'url' => $url,
            ]);
        }
        // dd($seccion);

        return  redirect()->route('admin.alcaldia.secciones.edit', ['alcaldia' => $seccion->alcaldia, 'seccion' => $seccion])->with('info', 'La sección se creo con exito');;
    }

    public function edit(Seccione $seccion)
    {
        $secciones = Dato::where('tipo', 'seccion')->get()->pluck('valor', 'valor');
        $alcaldia = $seccion->alcaldia;
        return view('admin.alcaldias.seccion.edit')->with(compact('alcaldia', 'seccion','secciones'));
    }

    public function update(SeccionRequest $request, Seccione $seccion)
    {
        // $this->authorize('author', $post);
        // dd($request->all());
        $seccion->update($request->all());
        if($request->file('file')){
            $url = Storage::put('public/posts', $request->file('file'));

            if($seccion->image){
                Storage::delete($seccion->image->url);
                $seccion->image->update([
                    'tipo' => $seccion->seccion,
                    'url' => $url
                ]);
            }else{
                $seccion->image()->create([
                    'tipo' => $seccion->seccion,
                    'url' => $url,
                ]);
            }
        }
        return redirect()->route('admin.alcaldia.secciones.edit', ['alcaldia' => $seccion->alcaldia, 'seccion' => $seccion])->with('info', 'La sección se actualizo con exito');
    }

}
