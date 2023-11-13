<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursale extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'sucursales';

    protected $fillable = ['departamento','nombre_sucursal','direccion','coordenadas','responsable_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function persona()
    {
        return $this->hasOne('App\Models\Persona', 'id', 'responsable_id');
    }

}
