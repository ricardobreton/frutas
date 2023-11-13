<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alcaldia extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'alcaldias';

    protected $fillable = ['nombre','telefono','correo','direccion'];

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function images(){
        return $this->morphToMany(Image::class, 'imageable');
    }

    public function imagenes($tipo){
        return $this->morphMany(Image::class, 'imageable')->where('tipo', $tipo);
    }

    public function allImages() {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comunidadTuristicas()
    {
        return $this->hasMany('App\Models\ComunidadTuristica', 'alcaldia_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function multimedia()
    {
        return $this->hasMany('App\Models\Multimedia', 'alcaldia_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicios()
    {
        return $this->hasMany('App\Models\Servicio', 'alcaldia_id', 'id');
    }

    public function videos() {
        return $this->hasMany(Video::class);
    }

    public function secciones() {
        return $this->hasMany(Seccione::class, 'alcaldia_id', 'id');
        // return $this->hasOne('App\Models\Alcaldia', 'id', 'alcaldia_id');

    }

}
