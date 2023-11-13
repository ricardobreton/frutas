<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'productos';

    protected $fillable = ['nombre_producto','descripcion','img_datos','img_producto','categoria_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoriaProducto()
    {
        return $this->hasOne('App\Models\CategoriaProducto', 'id', 'categoria_id');
    }

    public function categoria()
    {
                return $this->belongsTo(CategoriaProducto::class);
    }
    public function getDescripcionProductoAttribute()
    {
        return substr($this->descripcion,0,150);
    }

}
