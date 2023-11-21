<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        foreach (range(1, 10) as $index) {
            
            $cpf = $faker->randomNumber(9) . '000'; // Adiciona zeros para completar 11 dígitos
            $cpf = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);


            DB::table('funcionario')->insert([
                'nome_func' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
                'cpf' => $cpf,
                'data_nasc' => $faker->date,
                'status' => $faker->randomElement([0, 1]),
                'estado' => $faker->stateAbbr,
                'cidade' => $faker->city,
                'bairro' => $faker->word,
                'rua' => $faker->streetName,
                'cep' => str_replace('-', '', $faker->postcode),
                'numero_casa' => $faker->buildingNumber,
                'complemento' => $faker->sentence,
                'celular' => $faker->phoneNumber,
                'funcao' => $faker->jobTitle, // Assuming jobTitle is appropriate for 'funcao'
                'salario' => $faker->randomFloat(2, 1000, 10000), // Adjust the range for salary as needed
            ]);
        }
    }
}
