<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'categoria_productos';

    protected $fillable = ['marca','especie','logo', 'especie_id'];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id');
    }

    public function primerProducto(){
        $producto = $this->productos()->first();
        if($producto){
            return $producto->id;
        }
        return 0;
    }

    public function miespecie()
    {
        return $this->belongsTo(Especy::class, 'especie_id');
    }


}
