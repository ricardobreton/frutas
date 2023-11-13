<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrusel extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'carrusel';

    protected $fillable = ['nombre','descripcion','url_imagen','orden','activa','especie_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function especy()
    {
        return $this->hasOne('App\Models\Especy', 'id', 'especie_id');
    }

    public function miespecie()
    {
        return $this->belongsTo(Especy::class, 'especie_id');
    }

    
}
