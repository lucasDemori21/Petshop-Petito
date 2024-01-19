<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Criar dois clientes
        DB::table('cliente')->insert([
            'nome_cliente' => 'Cliente 1',
            'email' => 'cliente1@example.com',
            'password' => Hash::make('1234'),
            'created_at' => now(),
            'cpf' => '123.456.789-01',
            'data_nasc' => '1990-01-01',
            'status' => 1,
            'estado' => 'SP',
            'cidade' => 'São Paulo',
            'bairro' => 'Centro',
            'rua' => 'Rua A',
            'cep' => '01234-567',
            'numero_casa' => '123',
            'complemento' => 'Apto 456',
            'celular' => '(11) 98765-4321',
            'updated_at' => now(),
        ]);

        // Criar dois funcionários
        DB::table('funcionario')->insert([
            'nome_func' => 'Funcionário 1',
            'email' => 'funcionario1@example.com',
            'password' => Hash::make('1234'),
            'created_at' => now(),
            'cpf' => '111.222.333-44',
            'data_nasc' => '1980-03-10',
            'status' => 1,
            'estado' => 'MG',
            'cidade' => 'Belo Horizonte',
            'bairro' => 'Centro',
            'rua' => 'Rua X',
            'cep' => '30123-456',
            'numero_casa' => '789',
            'complemento' => 'Sala 101',
            'celular' => '(31) 98765-4321',
            'updated_at' => now(),
            'funcao' => 'Gerente de Vendas',
            'salario' => 7000.00,
        ]);

        $fakerF = Faker::create();

        // foreach (range(1, 10) as $index) {

        //     $cpf = $fakerF->randomNumber(9) . '000'; // Adiciona zeros para completar 11 dígitos
        //     $cpf = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);


        //     DB::table('funcionario')->insert([
        //         'nome_func' => $fakerF->name,
        //         'email' => $fakerF->unique()->safeEmail,
        //         'password' => Hash::make('12345678'),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //         'cpf' => $cpf,
        //         'data_nasc' => $fakerF->date,
        //         'status' => $fakerF->randomElement([0, 1]),
        //         'estado' => $fakerF->stateAbbr,
        //         'cidade' => $fakerF->city,
        //         'bairro' => $fakerF->word,
        //         'rua' => $fakerF->streetName,
        //         'cep' => str_replace('-', '', $fakerF->postcode),
        //         'numero_casa' => $fakerF->buildingNumber,
        //         'complemento' => $fakerF->sentence,
        //         'celular' => $fakerF->phoneNumber,
        //         'funcao' => $fakerF->jobTitle, // Assuming jobTitle is appropriate for 'funcao'
        //         'salario' => $fakerF->randomFloat(2, 1000, 10000), // Adjust the range for salary as needed
        //     ]);
        // }

        // $fakerC = Faker::create();

        // foreach (range(1, 10) as $index) {

        //     $cpf = $fakerC->randomNumber(9) . '000'; // Adiciona zeros para completar 11 dígitos
        //     $cpf = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);


        //     DB::table('cliente')->insert([
        //         'nome_cliente' => $fakerC->name,
        //         'email' => $fakerC->unique()->safeEmail,
        //         'password' => Hash::make('1234'),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //         'cpf' => $cpf,
        //         'data_nasc' => $fakerC->date,
        //         'status' => $fakerC->randomElement([0, 1]),
        //         'estado' => $fakerC->stateAbbr,
        //         'cidade' => $fakerC->city,
        //         'bairro' => $fakerC->word,
        //         'rua' => $fakerC->streetName,
        //         'cep' => str_replace('-', '', $fakerC->postcode),
        //         'numero_casa' => $fakerC->buildingNumber,
        //         'complemento' => $fakerC->sentence,
        //         'celular' => $fakerC->phoneNumber,
        //     ]);
        // }

        $categorias = [
            'Ração',
            'Acessórios',
            'Brinquedos',
            'Higiene',
            'Medicamentos',
            'Camas e Casinhas',
            'Coleiras e Guias',
            'Petiscos',
            'Grooming',
            'Transporte',
        ];

        // Inserir as categorias na tabela 'categoria'
        foreach ($categorias as $categoria) {
            DB::table('categoria')->insert([
                'nome_categoria' => $categoria,
            ]);
        }


        // $faker = Faker::create();

        // foreach (range(1, 50) as $index) {
        //     DB::table('produto')->insert([
        //         'id_categoria' => $faker->numberBetween(1, 10), // Ajuste conforme suas categorias
        //         'titulo' => $faker->words(3, true),
        //         'descricao' => $faker->paragraph,
        //         'qtd_produto' => $faker->numberBetween(1, 100),
        //         'valor' => $faker->randomFloat(2, 10, 100),
        //         'created_at' => $faker->dateTimeThisYear(),
        //         'updated_at' => $faker->dateTimeThisYear(),
        //         'img_produto' => $faker->imageUrl(200, 200, 'cats'), // Substitua 'cats' pelo seu tipo de imagem
        //     ]);
        // }
    }
}
