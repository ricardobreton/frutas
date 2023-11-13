<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Especy extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'especies';

    protected $fillable = ['nombre','codigo_svg','icono','activo','usar_icono'];

    public function imagenesTheme()
    {
        return $this->hasMany(ThemeImg::class,'especie_id');
    }

    public function getElemento($seccion)
    {
        $especie = new Especy();
        $especie->ruta_img = 'paginas/general_default.png';
        $imagenes = $this->imagenesTheme;
        foreach ($imagenes as $key => $value) {
            if ($value->seccion == $seccion) {
                return $value;
            }
        }
        return $especie;
    }

}
