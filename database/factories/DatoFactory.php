<?php

namespace Database\Factories;

use App\Models\Dato;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DatoFactory extends Factory
{
    protected $model = Dato::class;

    public function definition()
    {
        return [
			'tipo' => $this->faker->name,
			'valor' => $this->faker->name,
			'activo' => $this->faker->name,
        ];
    }
}
