<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Puntuacion;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Puntuacion>
 */
class PuntuacionFactory extends Factory
{
    protected $model = Puntuacion::class;
    public function definition(): array
    {
        return [
            'puntuacion' => $this->faker->randomNumber(2),
            'pieza_id' => $this->faker->randomNumber(2),
            'usuario_id' => $this->faker->randomNumber(2),
        ];
    }
}
