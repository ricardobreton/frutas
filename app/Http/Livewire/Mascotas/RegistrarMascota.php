<?php

namespace App\Http\Livewire\Mascotas;

use App\Models\Mascota;
use App\Models\TipoMascota;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;


class RegistrarMascota extends Component
{
    use WithFileUploads;
    public $nombres,$activo,$fecha_nac,$sexo,$raza,$descripcion,$peso,$vacunas,$persona_id,$tipo_mascota_id;
    public $tipo_mascota = '', $selected_raza, $selected_edad, $lista_mascotas=[], $foto = null, $edad = 0;

    public function resetDatos()
    {
        $this->reset([
            'nombres',
            'activo',
            'fecha_nac',
            'sexo',
            'raza',
            'foto',
            'descripcion',
            'peso',
            'vacunas',
            'persona_id',
            'tipo_mascota_id'
        ]);
    }

    public function actualizarRaza()
    {
        $this->lista_mascotas = TipoMascota::where('especie', $this->tipo_mascota)->get()->pluck('raza', 'id');
    }

    public function render()
    {
        return view('livewire.mascotas.registrar-mascota');
    }

    public function guardarImg($file, $carpeta)
    {
        $fecha = new \Carbon\Carbon();
        $name_img = $fecha->format('dmy_hms').rand();
        $ext_image = $file->extension();
        $ruta_name = $file->storeAs("public/".$carpeta,$name_img.'.'.$ext_image);
        return str_replace('public/','',$ruta_name);
    }
    public function borrarfoto($ruta_name)
    {
        $ruta_name = str_replace('public/','',$ruta_name);
        $destination = public_path('storage\\'.$ruta_name);
        if(File::exists($destination)){
            session()->flash('message', 'Archivo Borrado.');
            File::delete($destination);
        }
    }

    public function store()
    {
        // dd($this->peso);
        $this->validate([
            'nombres' => 'required',
            'tipo_mascota' => 'required',
            'edad' => 'required|numeric',
            // 'sexo' => 'required',
            'selected_raza' => 'required',
            // 'foto' => 'required',
            // 'descripcion' => 'required',
            // 'peso' => 'required',
            // 'vacunas' => 'required',
            // 'persona_id' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);
        // $this->persona_id = Auth::user()->persona->id;
        $fecha = new \Carbon\Carbon();
        $date = \Carbon\Carbon::createFromDate($fecha->format('Y'), 1, 1);
        $date = $date->subYears($this->selected_edad);
        $nombreImg = "mascotas/mascota.png";
        if ($this->foto) {
            $nombreImg = $this->guardarImg($this->foto, 'mascotas');
        }
        // dd($nombreImg);
        Mascota::create([
            'nombres' => $this->nombres,
            'fecha_nac' => $date->format('Y-m-d'),
            'sexo' => $this->sexo,
            'raza' => $this->raza,
            'foto' => $nombreImg,
            'descripcion' => $this->descripcion,
            'peso' => $this->peso,
            'vacunas' => $this->vacunas,
            'persona_id' => Auth::user()->persona->id,
            'tipo_mascota_id' => $this->selected_raza,
        ]);

        $this->resetDatos();
		// $this->emit('closeModal');
		session()->flash('message', 'Mascota creada satisfactoriamente.');
    }
}
