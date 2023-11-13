<?php

namespace Database\Factories;

use App\Models\Alcaldia;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AlcaldiaFactory extends Factory
{
    protected $model = Alcaldia::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'telefono' => $this->faker->name,
			'correo' => $this->faker->name,
			'direccion' => $this->faker->name,
        ];
    }
}
