<?php

namespace Database\Factories;

use App\Models\Sucursale;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SucursaleFactory extends Factory
{
    protected $model = Sucursale::class;

    public function definition()
    {
        return [
			'departamento' => $this->faker->name,
			'nombre_sucursal' => $this->faker->name,
			'direccon' => $this->faker->name,
			'coordenadas' => $this->faker->name,
			'responsable_id' => $this->faker->name,
        ];
    }
}
