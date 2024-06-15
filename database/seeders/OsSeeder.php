<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\OS;
use App\Models\Servico;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        
        $servico = Servico::factory(15)->create();
  
        $os = OS::factory(15)->create();

        $cliente = Cliente::factory(15)->create();
        
        $os->each(function(OS $os) use ($faker){
          
           OS::factory()->create([
              'cliente_id' => Cliente::all()->random(),
              'servico_id' => Servico::all()->random(),
              'descricao' => fake()->text(),
              'preco' => fake()->randomFloat(2,0,2000),
         ]);
  
    
  
        });
  
        $cliente->each(function(Cliente $cliente) use ($faker){
          
          Cliente::factory()->create([
               'name' => $faker->name(),
               'endereco' => $faker->address(),
               'email' => $faker->unique()->safeEmail(),
               'cpf' => $faker->cpf,
               'telefone' => '33'.$faker->cellphone,
            ]);
  
        });
    }
}
