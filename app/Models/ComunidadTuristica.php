<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComunidadTuristica extends Model
{
    use HasFactory;
    protected $table = 'comunidad_turisticas';
    protected $fillable = [
        'ruta', 'tiempo', 'distancia', 'alcaldia_id'
    ];
}
