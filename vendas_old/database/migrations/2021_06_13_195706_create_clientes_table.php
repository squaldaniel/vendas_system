<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('cpf', "11")->unique();
            $table->string("nome");
            $table->date('nascimento');
            $table->string("nome_responsavel");
            $table->string("cpf_responsavel", "11");
            $table->date('nascimento_responsavel');
            $table->date("data_cadastro");
            $table->integer('cep');
            $table->string('endereco');
            $table->string('bairro');
            $table->string('numero');
            $table->string('fone_fixo');
            $table->string('fone_celular');
            $table->string('plano');
            $table->string("parcelas_plano");
            $table->string("material");
            $table->string("parcelas_material");
            $table->biginteger("cadastrado_por")->unsigned()
                ->references("id")->on("usuarios")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
