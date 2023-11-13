<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use Illuminate\Http\Request;

class ClienteController extends Controller
{


    public function update(Request $request, Persona $persona)
    {
        //actualizar datos persona
        $validado = $request->validate([
            'ci_nit' => 'required|min:5|unique:personas,ci_nit,' . $persona->id,
            'nombres' => 'required',
            'apellidos' => 'nullable',
            'direccion' => 'nullable',
            'telefonos' => 'nullable',
            'whatsapp'  => 'nullable',
            'fecha_nac' => 'date',
        ]);
        $validado['whatsapp'] = $request->whatsapp ? 1 : 0;
        // dd($validado);
        $persona->update($validado);
        return redirect()->route('user.profile')->with('success', 'Datos actualizados correctamente');
    }

}
