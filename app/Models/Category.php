<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];
    /**Relacions uno a muchos */
    public function post(){
        return $this->hasMany(Post::class);

    }

    public function getRouteKeyName() {
        return "slug";
    }
}
