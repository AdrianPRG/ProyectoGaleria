<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Fabricante;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fabricante>
 */
class FabricanteFactory extends Factory
{
    protected $model = Fabricante::class;
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'descripcion' => $this->faker->text,
            'imagen' => $this->faker->imageUrl,
            'activo' => $this->faker->boolean,
        ];
    }
}
