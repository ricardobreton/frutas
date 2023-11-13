<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'images';

    protected $fillable = ['tipo','url','imageable_id','imageable_type'];

    public function scopeImagenesTipo($query, $tipo){
        return $query->where('tipo', $tipo);
    }

    //relacion polimorfica

    public function imageable(){
        return $this->morphTo();
    }

    public function images(){
        return $this->morphTo();
    }

    // public function images(){
    //     return $this->morphToMany();
    // }
}
