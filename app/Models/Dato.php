<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dato extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'datos';

    protected $fillable = ['tipo','valor','activo'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicios()
    {
        return $this->hasMany('App\Models\Servicio', 'tipo_servicio_id', 'id');
    }
    
}
