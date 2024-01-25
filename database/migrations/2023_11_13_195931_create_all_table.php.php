<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('cliente', function (Blueprint $table) {

            $table->id('id_cliente');
            $table->string('nome_cliente', 100)->nullable(false);
            $table->string('email', 45)->unique()->nullable(false);
            $table->string('password', 255)->nullable(false);
            $table->string('cpf', 14)->nullable(false)->unique();
            $table->date('data_nasc')->nullable(false);
            $table->tinyInteger('status')->nullable(false);
            $table->string('estado', 2)->nullable(false);
            $table->string('cidade', 45)->nullable(false);
            $table->string('bairro', 100)->nullable(false);
            $table->string('rua', 100)->nullable(false);
            $table->string('cep', 9)->nullable(false);
            $table->string('numero_casa', 20)->nullable(false);
            $table->string('complemento', 100);
            $table->string('celular', 20)->nullable(false);
            $table->timestamps();
            $table->rememberToken();
        });

        Schema::create('funcionario', function (Blueprint $table) {

            $table->id('id_func');
            $table->string('nome_func', 100)->nullable(false);
            $table->string('email', 45)->unique()->nullable(false);
            $table->string('password', 255)->nullable(false);
            $table->string('cpf', 14)->nullable(false)->unique();
            $table->date('data_nasc')->nullable(false);
            $table->tinyInteger('status')->nullable(false);
            $table->string('estado', 2)->nullable(false);
            $table->string('cidade', 45)->nullable(false);
            $table->string('bairro', 100)->nullable(false);
            $table->string('rua', 100)->nullable(false);
            $table->string('cep', 9)->nullable(false);
            $table->string('numero_casa', 20)->nullable(false);
            $table->string('complemento', 100);
            $table->string('celular', 20)->nullable(false);
            $table->timestamps();
            $table->string('funcao', 45)->nullable(false);
            $table->decimal('salario', 10, 2)->nullable();
            $table->rememberToken();
        });

        Schema::create('procedimento', function (Blueprint $table) {
            $table->id('id_procedimento');
            $table->string('titulo', 100)->nullable(false)->unique();
            $table->longText('descricao')->nullable(false);
            $table->timestamps();
            $table->decimal('valor', 10, 2)->nullable(false);
        });

        Schema::create('pets', function (Blueprint $table) {
            $table->id('id_pet');
            $table->integer('usn_cod');
            $table->string('nome', 50);
            $table->date('data_nasc');
            $table->string('tipo_pet');
            $table->tinyInteger('sexo')->nullable(); // 1 = Macho, 2 = Fêmea
            $table->tinyInteger('castrado')->nullable(); // 1 = Sim, 2 = Não
            $table->tinyInteger('dono')->nullable(); // 1 = Cliente, 2 = Funcionário
            $table->decimal('peso', 8, 3)->nullable();
            $table->longText('img_pet')->nullable();
            $table->timestamps(); // Adiciona automaticamente created_at e updated_at
        });

        Schema::create('categoria', function (Blueprint $table) {
            $table->id('id_categoria');
            $table->string('nome_categoria')->nullable(false)->unique();
        });

        Schema::create('horarios', function (Blueprint $table) {
            $table->id('id_horario');
            $table->string('horario')->nullable(false)->unique();
        });

        Schema::create('produto', function (Blueprint $table) {
            $table->id('id_produto');
            $table->foreignId('id_categoria')->constrained('categoria', 'id_categoria');
            $table->string('titulo')->nullable(false);
            $table->longText('descricao')->nullable(false);
            $table->integer('qtd_produto');
            $table->decimal('valor', 10, 2)->nullable(false);
            $table->timestamps();
            $table->longText('img_produto');
        });

        Schema::create('carrinho', function (Blueprint $table) {
            $table->id('id_carrinho');
            $table->integer('usn_cod')->nullable(false);
            $table->integer('dono')->nullable(false);
            $table->foreignId('id_produto')->constrained('produto', 'id_produto');
            $table->timestamps();
        });

        Schema::create('venda', function (Blueprint $table) {
            $table->id('id_venda');
            $table->integer('usn_cod');
            $table->integer('dono')->nullable(false);
            $table->date('date_compra')->nullable(false);
            $table->decimal('valor_total', 10, 2)->nullable(false);
            $table->string('forma_pagamento', 45)->nullable(false);
            $table->timestamps();
        });
        

        Schema::create('item_venda', function (Blueprint $table) {
            $table->id('id_item_venda');
            $table->foreignId('id_venda')->constrained('venda', 'id_venda');
            $table->foreignId('id_produto')->constrained('produto', 'id_produto');
            $table->integer('qtd_produto');
            $table->decimal('valor_unitario', 10, 2)->nullable(false);
            $table->timestamps();
        });

        Schema::create('agendamento', function (Blueprint $table) {
            $table->id('id_agendamento');
            $table->foreignId('id_pet')->constrained('pets', 'id_pet');
            $table->foreignId('id_func')->constrained('funcionario', 'id_func');
            $table->foreignId('id_procedimento')->constrained('procedimento', 'id_procedimento');
            $table->integer('usn_cod')->nullable(false);
            $table->string('dono')->nullable(false);
            $table->longText('descricao')->nullable(false);
            $table->dateTime('data')->nullable(false);
            $table->timestamps();
            $table->decimal('valor', 10, 2);
            $table->string('forma_pagamento', 45);
        });

        Schema::create('dados_empresa', function (Blueprint $table) {

            $table->id('id_dados');
            $table->string('razao_social')->nullable(false);
            $table->string('razao_empresa')->nullable(false);
            $table->string('nome_fantasia')->nullable(false);
            $table->string('inscricao_estadual');
            $table->string('cnpj', 18)->nullable(false)->unique();
            $table->string('logo');
            $table->string('pais', 45)->nullable(false);
            $table->string('estado', 2)->nullable(false);
            $table->string('cidade', 45)->nullable(false);
            $table->string('bairro', 100)->nullable(false);
            $table->string('rua', 100)->nullable(false);
            $table->string('cep', 9)->nullable(false);
            $table->string('numero_casa', 20)->nullable(false);
            $table->string('complemento', 100);
            $table->string('celular', 20)->nullable(false);
            $table->timestamps();
            $table->string('telefone', 15)->nullable(false);
            $table->string('email', 45)->nullable()->unique();
        });

        Schema::create('password_resets', function (Blueprint $table) {

            $table->string('email');
            $table->string('token', 40);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('cliente');
        Schema::dropIfExists('funcionario');
        Schema::dropIfExists('procedimento');
        Schema::dropIfExists('pet');
        Schema::dropIfExists('categoria');
        Schema::dropIfExists('produto');
        Schema::dropIfExists('venda');
        Schema::dropIfExists('dados_empresa');
        Schema::dropIfExists('carrinho');
    }
};
