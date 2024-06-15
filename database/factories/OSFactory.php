<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Servico;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OS>
 */
class OSFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('pt_BR');
        
        return [

            'cliente_id' => Cliente::factory()->create(),
            'servico_id' => Servico::factory()->create(),
            
            'descricao' => fake()->text(),
            'preco' => fake()->randomFloat(2,0,2000),
           
        ];
    }
}
