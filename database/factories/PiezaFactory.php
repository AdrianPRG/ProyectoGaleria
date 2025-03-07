<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pieza;
use Illuminate\Support\Facades\App;
use App\Models\Categoria;
use App\Models\Fabricante;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pieza>
 */
class PiezaFactory extends Factory
{
    protected $model = Pieza::class;
    public function definition(): array
    {
        return [
'nombre' => $this->faker->randomElement([ 'Reliquia 100', 'Esencia Perdida', 'Fragmento Celeste', 'Cristal del Tiempo', 'Emblema Arcano', 'Herencia Dorada', 'Símbolo Ancestral', 'Secreto Olvidado', 'Eco del Pasado', 'Luz de Eternidad' ]),            'descripcion' => $this->faker->text,
            //Como el tipo es un enum, se le pasa un valor aleatorio de los que tiene

            'tipo' => $this->faker->randomElement(['reloj', 'brujula','collar','pulsera','anillo','pendiente']),
            'imagen' => $this->faker->word,
            'marca' => $this->faker->randomElement([
    'Aeternum',  
    'Velkan',  
    'Mythos',  
    'Zafirox',  
    'Oricalco',  
    'Luxor',  
    'Nemora',  
    'Eldoria',  
    'Chronis',  
    'Argentum'  
]),

'modelo' => $this->faker->randomElement([
    'X1000',  
    'Eclipse 500',  
    'Aurora X',  
    'Sigma 7',  
    'Zenith Pro',  
    'Titan 300',  
    'Legacy 10',  
    'Nebula S',  
    'Quantum V',  
    'Alpha Core'  
]),
            'puntuacion' => $this->faker->randomNumber(2),
            'categoria_id' => \App\Models\Categoria::factory(),
            'fabricante_id' => \App\Models\Fabricante::factory(),

        ];
    }
}
