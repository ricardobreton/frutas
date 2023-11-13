<?php

namespace Database\Factories;

use App\Models\EventoInfo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventoInfoFactory extends Factory
{
    protected $model = EventoInfo::class;

    public function definition()
    {
        return [
			'mas_info' => $this->faker->name,
			'evento_id' => $this->faker->name,
        ];
    }
}
