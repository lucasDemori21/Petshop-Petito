<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker2 = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('categoria')->insert([
                'nome_categoria' => $faker2->word,
            ]);
        }


        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('produto')->insert([
                'id_categoria' => $faker->numberBetween(1, 10), // Ajuste conforme suas categorias
                'titulo' => $faker->words(3, true),
                'descricao' => $faker->paragraph,
                'qtd_produto' => $faker->numberBetween(1, 100),
                'valor' => $faker->randomFloat(2, 10, 100),
                'created_at' => $faker->dateTimeThisYear(),
                'updated_at' => $faker->dateTimeThisYear(),
                'img_produto' => $faker->imageUrl(200, 200, 'cats'), // Substitua 'cats' pelo seu tipo de imagem
            ]);
        }
    }
}
