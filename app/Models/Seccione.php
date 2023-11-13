<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccione extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'secciones';

    protected $fillable = ['seccion','status','contenido','alcaldia_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function alcaldia()
    {
        return $this->hasOne('App\Models\Alcaldia', 'id', 'alcaldia_id');
    }

    //realacion uno a uno polimorfica
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function imagenes($tipo){
        return $this->morphMany(Image::class, 'imageable')->where('tipo', $tipo);
    }


}
