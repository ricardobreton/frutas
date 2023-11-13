<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table = 'personas';
    protected $dates = ['fecha_nac'];
    protected $fillable = [
        'ci_nit', 'nombres', 'apellidos', 'direccion', 'telefonos', 'fecha_nac', 'whatsapp'
    ];

    public function mascotas()
    {
        return $this->hasMany(Mascota::class);
    }

    public function getNumMascotasAttribute()
    {
        return $this->mascotas()->count();
    }
    public function getFullNameAttribute()
    {
        return "{$this->nombres} {$this->apellidos}";
    }
    public function usuario()
    {
        return $this->hasOne(User::class);
    }

    public function setWhatsappAttribute($value)
    {
        $this->attributes['whatsapp'] = $value === 'on' ? 1 : 0;
    }
}
