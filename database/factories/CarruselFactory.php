<?php

namespace Database\Factories;

use App\Models\Carrusel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CarruselFactory extends Factory
{
    protected $model = Carrusel::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'descripcion' => $this->faker->name,
			'url_imagen' => $this->faker->name,
			'orden' => $this->faker->name,
			'activa' => $this->faker->name,
			'especie_id' => $this->faker->name,
        ];
    }
}
