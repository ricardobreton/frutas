<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VideoFactory extends Factory
{
    protected $model = Video::class;

    public function definition()
    {
        return [
			'tipo_video' => $this->faker->name,
			'preview' => $this->faker->name,
			'ruta' => $this->faker->name,
        ];
    }
}
