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
            $table->timestamp('created_at')->nullable(false);
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
            $table->timestamp('updated_at');
            $table->rememberToken();


        });

        Schema::create('funcionario', function (Blueprint $table) {
            
            $table->id('id_func');
            $table->string('nome_func', 100)->nullable(false);
            $table->string('email', 45)->unique()->nullable(false);
            $table->string('password', 255)->nullable(false);
            $table->timestamp('created_at')->nullable(false);
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
            $table->timestamp('updated_at');
            $table->string('funcao', 45)->nullable(false);
            $table->decimal('salario', 10, 2)->nullable();
            $table->rememberToken();


        });

        Schema::create('procedimento', function (Blueprint $table) {
            $table->id('id_procedimento');
            $table->string('titulo', 100)->nullable(false)->unique();
            $table->longText('descricao')->nullable(false);
            $table->timestamp('create_time')->nullable(false);
            $table->timestamp('update_time');
            $table->decimal('valor', 10, 2)->nullable(false);
        });

        Schema::create('pet', function (Blueprint $table) {
            $table->id('id_animal');
            $table->string('nome_pet', 50)->nullable(false);
            $table->date('data_nasc')->nullable(false);
            $table->string('tipo_animal')->nullable(false)->unique();
            $table->string('raca_animal');
            $table->string('cor_pelo', 50)->nullable(false);
            $table->decimal('peso', 5, 2);
            $table->timestamp('create_time')->nullable(false);
            $table->timestamp('update_time');
        });

        Schema::create('categoria', function (Blueprint $table) {
            $table->id('id_categoria');
            $table->string('nome_categoria')->nullable(false)->unique();
        });
        
        Schema::create('produto', function (Blueprint $table) {
            $table->id('id_produto');
            $table->foreignId('id_categoria')->constrained('categoria', 'id_categoria');
            $table->string('titulo')->nullable(false);
            $table->longText('descricao')->nullable(false);
            $table->integer('qtd_produto');
            $table->decimal('valor', 10, 2)->nullable(false);
            $table->timestamp('created_at')->nullable(false);
            $table->timestamp('updated_at');
            $table->longText('img_produto');
        });

        Schema::create('venda', function (Blueprint $table) {
            $table->id('id_venda');
            $table->foreignId('id_cliente')->constrained('cliente', 'id_cliente');
            $table->foreignId('id_produto')->constrained('produto', 'id_produto');
            $table->date('date_compra')->nullable(false);
            $table->integer('qtd_produto');
            $table->decimal('valor', 10, 2)->nullable(false);
            $table->string('forma_pagamento', 45)->nullable(false);
            $table->timestamp('horario_venda')->nullable(false);
        });

        Schema::create('agendamento', function (Blueprint $table) {
            $table->id('id_agendamento');
            $table->foreignId('id_func')->constrained('funcionario', 'id_func');
            $table->foreignId('id_cliente')->constrained('cliente', 'id_cliente');
            $table->foreignId('id_animal')->constrained('animal', 'id_animal');
            $table->longText('descricao')->nullable(false);
            $table->dateTime('agendamento')->nullable(false);
            $table->timestamp('created_at')->nullable(false);
            $table->timestamp('updated_at');
            $table->decimal('valor', 10, 2)->nullable(false);
            $table->string('forma_pagamento', 45)->nullable(false);
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
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
            $table->string('telefone', 15)->nullable(false);
            $table->string('email', 45)->nullable()->unique();

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
        Schema::dropIfExists('animal');
        Schema::dropIfExists('categoria');
        Schema::dropIfExists('produto');
        Schema::dropIfExists('venda');
        Schema::dropIfExists('dados_empresa');

    }
};
