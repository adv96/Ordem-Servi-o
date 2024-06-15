<?php

namespace Database\Seeders;

use App\Models\Servico;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdministrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'angelodutra55@gmail.com',
            'password' => bcrypt('password'),
        ]);

        Servico::factory()->create([
           
            'name' => 'Formatação',
        
        ]);


    }
}
