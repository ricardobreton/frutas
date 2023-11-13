<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'videos';

    protected $fillable = ['tipo_video','preview','ruta','alcaldia_id'];

}
