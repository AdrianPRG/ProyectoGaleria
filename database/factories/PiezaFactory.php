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
            //Como el tipo es un enum, se le pasa un valor aleatorio de los que tiene

            'tipo' => $this->faker->randomElement(['reloj', 'brujula','collar','pulsera','anillo','pendiente']),
            'imagen' => $this->faker->word,
            'marca' => $this->faker->word,
            'modelo' => $this->faker->word,
            'puntuacion' => $this->faker->randomNumber(2),
            'categoria_id' => $this->faker->randomNumber(1),
            'fabricante_id' => $this->faker->randomNumber(1, 10),

        ];
    }
}
