<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Galeria;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Galeria>
 */
class GaleriaFactory extends Factory
{
    protected $model = Galeria::class;
    public function definition(): array
    {
        return [
            'id_usuario' => $this->faker->randomNumber(1, 10),
            'id_puntuacion' => $this->faker->randomNumber(1, 10),
        ];
    }
}
