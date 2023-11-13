<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoInfo extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'evento_info';

    protected $fillable = ['mas_info','evento_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function evento()
    {
        return $this->hasOne('App\Models\Evento', 'id', 'evento_id');
    }

}
