<?php

namespace Database\Factories;

use App\Models\ThemeImg;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ThemeImgFactory extends Factory
{
    protected $model = ThemeImg::class;

    public function definition()
    {
        return [
			'seccion' => $this->faker->name,
			'ruta_img' => $this->faker->name,
			'categoria_id' => $this->faker->name,
        ];
    }
}
