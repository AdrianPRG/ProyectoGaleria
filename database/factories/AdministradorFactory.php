<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Administrador;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Administrador>
 */
class AdministradorFactory extends Factory
{

    protected $model = Administrador::class;
    
    public function definition(): array
    {
        return [
            'id' => $this->faker->randomNumber(5),
            'email' => $this->faker->email(),
            'password' => $this->faker->password(),
        ];
    }
}
