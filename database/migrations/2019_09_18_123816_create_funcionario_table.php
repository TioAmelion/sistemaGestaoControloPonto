<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 50);
            $table->string('num_bi', 50)->nullable();
            $table->char('genero', 50)->nullable();
            $table->integer('telefone')->unsigned()->nullable();
            $table->string('departamento', 50)->nullable();
            $table->string('funcao', 50);
            $table->string('local_trabalho', 50)->nullable();
            $table->float('faixa_salarial', 8,2)->nullable();
            $table->string('imagem', 30)->nullable();
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
        Schema::dropIfExists('funcionario');
    }
}
