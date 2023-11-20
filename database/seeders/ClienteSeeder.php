<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class ClienteSeeder extends Seeder
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


            DB::table('cliente')->insert([
                'nome_cliente' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('1234'),
                'create_time' => now(),
                'update_time' => now(),
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
            ]);
        }
    }
}
