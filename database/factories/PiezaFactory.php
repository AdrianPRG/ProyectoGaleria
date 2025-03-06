<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pieza;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pieza>
 */
class PiezaFactory extends Factory
{
    protected $model = Pieza::class;
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'descripcion' => $this->faker->text,
            'tipo' => $this->faker->word,
            'imagen' => $this->faker->word,
            'marca' => $this->faker->word,
            'modelo' => $this->faker->word,
            'puntuacion' => $this->faker->randomNumber(2),
            'categoria_id' => $this->faker->randomNumber(1),
            'fabricante_id' => $this->faker->randomNumber(1),

        ];
    }
}
