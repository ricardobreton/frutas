<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition()
    {
        return [
			'nombre_producto' => $this->faker->name,
			'descripcion' => $this->faker->name,
			'img_datos' => $this->faker->name,
			'img_producto' => $this->faker->name,
			'categoria_id' => $this->faker->name,
        ];
    }
}
