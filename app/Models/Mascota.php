<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;
    protected $table = 'mascotas';
    protected $dates = ['fecha_nac'];
    protected $fillable = [
        'nombres','sexo','raza','foto','descripcion','peso','vacunas','persona_id','tipo_mascota_id', 'fecha_nac'
    ];

    public function miPersona()
    {
        return $this->belongsTo(Persona::class);
    }

}
