<?php

namespace Database\Factories;

use App\Models\Especy;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EspecyFactory extends Factory
{
    protected $model = Especy::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'codigo_svg' => $this->faker->name,
			'icono' => $this->faker->name,
			'activo' => $this->faker->name,
			'usar_icono' => $this->faker->name,
        ];
    }
}
