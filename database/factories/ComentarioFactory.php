<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comentario;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentario>
 */
class ComentarioFactory extends Factory
{
    protected $model = Comentario::class;
    public function definition(): array
    {
        return [
            'comentario' => $this->faker->text,
            'pieza_id' => $this->faker->numberBetween(1, 100),
            'usuario_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}
