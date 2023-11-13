<?php

namespace Database\Factories;

use App\Models\Seccione;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SeccioneFactory extends Factory
{
    protected $model = Seccione::class;

    public function definition()
    {
        return [
			'seccion' => $this->faker->name,
			'contenido' => $this->faker->name,
			'alcaldia_id' => $this->faker->name,
        ];
    }
}
