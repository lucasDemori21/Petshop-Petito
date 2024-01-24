<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        $startTime = strtotime('07:00');
        $endTime = strtotime('19:00');
        $interval = 30 * 60;

        while ($startTime <= $endTime) {
            $horario = date('H:i', $startTime);
            DB::table('horarios')->insert([
                'horario' => $horario,
            ]);
            $startTime += $interval;
        }

    
        foreach ($categorias as $categoria) {
            DB::table('categoria')->insert([
                'nome_categoria' => $categoria,
            ]);
        }

        DB::table('procedimento')->insert([
            [
                'titulo' => 'Vacina',
                'descricao' => 'Vacinação para prevenção de doenças.',
                'valor' => 50.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Banho',
                'descricao' => 'Banho padrão para pets.',
                'valor' => 30.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Tosa',
                'descricao' => 'Tosa padrão para pets.',
                'valor' => 30.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Banho + Tosa',
                'descricao' => 'Banho e Tosa padrão para pets.',
                'valor' => 50.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Consulta',
                'descricao' => 'Consulta padrão para pets.',
                'valor' => 30.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Cirurgia',
                'descricao' => 'Cirurgia padrão para pets.',
                'valor' => 30.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
