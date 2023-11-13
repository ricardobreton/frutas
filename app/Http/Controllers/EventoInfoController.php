<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\EventoInfo;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;

class EventoInfoController extends Controller
{
    public function editinfo(Evento $evento)
    {
        // $evento = EventoInfo::Findorfail($evento_id);
        $eventoInfo = EventoInfo::where('evento_id', $evento->id)->first();
        if(is_null($eventoInfo)){
            $eventoInfo = EventoInfo::create([
                'mas_info' => 'Editar mas información del evento',
                'evento_id' => $evento->id,
            ]);
        }
        return view('eventoinfo.edit')->with(compact('evento','eventoInfo'));
    }
    public function storeinfo(EventoInfo $eventoinfo,  Request $request)
    {
        // dd($request->all());
        $eventoinfo->update($request->all());
        // dd($eventoinfo);
        return redirect()->route('admin.evento.info',[$eventoinfo->evento_id]);
    }
}
