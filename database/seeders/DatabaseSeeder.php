<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        DB::table('cliente')->insert([
            'nome_cliente' => 'Cliente 2',
            'email' => 'cliente2@example.com',
            'password' => Hash::make('1234'),
            'created_at' => now(),
            'cpf' => '987.654.321-09',
            'data_nasc' => '1985-05-15',
            'status' => 1,
            'estado' => 'RJ',
            'cidade' => 'Rio de Janeiro',
            'bairro' => 'Copacabana',
            'rua' => 'Avenida B',
            'cep' => '22345-678',
            'numero_casa' => '456',
            'complemento' => 'Casa 789',
            'celular' => '(21) 98765-4321',
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

        DB::table('funcionario')->insert([
            'nome_func' => 'Funcionário 2',
            'email' => 'funcionario2@example.com',
            'password' => Hash::make('1234'),
            'created_at' => now(),
            'cpf' => '555.666.777-88',
            'data_nasc' => '1975-12-05',
            'status' => 1,
            'estado' => 'RS',
            'cidade' => 'Porto Alegre',
            'bairro' => 'Vila Nova',
            'rua' => 'Rua Y',
            'cep' => '90876-543',
            'numero_casa' => '101',
            'complemento' => 'Andar 2',
            'celular' => '(51) 98765-4321',
            'updated_at' => now(),
            'funcao' => 'Analista de TI',
            'salario' => 6000.00,
        ]);

    }
}
