<?php

namespace Database\Factories;

use App\Models\CategoriaProducto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoriaProductoFactory extends Factory
{
    protected $model = CategoriaProducto::class;

    public function definition()
    {
        return [
			'marca' => $this->faker->name,
			'especie' => $this->faker->name,
			'logo' => $this->faker->name,
        ];
    }
}
