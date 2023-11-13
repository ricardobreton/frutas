<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    /** se pone los campos que se quiere evitar para asignacion masiva */
    protected $guarded = ['id', 'create_at', 'updated_at'];
    /**relacion uno a muchos inversa */
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    /** Relacion muchos a muchos */
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //realacion uno a uno polimorfica
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
