<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeImg extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'theme_imgs';

    protected $fillable = ['seccion','ruta_img','especie_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function especie()
    {
        return $this->belongsTo(Especy::class, 'especie_id');
    }

}
