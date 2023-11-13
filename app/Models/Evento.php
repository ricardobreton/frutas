<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'eventos';

    protected $fillable = ['tipo_evento','titulo','foto_evento','descripcion'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventoInfos()
    {
        return $this->hasMany('App\Models\EventoInfo', 'evento_id', 'id');
    }
    
}
