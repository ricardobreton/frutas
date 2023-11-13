<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ImageFactory extends Factory
{
    protected $model = Image::class;

    public function definition()
    {
        return [
			'tipo' => $this->faker->name,
			'url' => $this->faker->name,
			'imageable_id' => $this->faker->name,
			'imageable_type' => $this->faker->name,
        ];
    }
}
