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
            $table->string('num_bi', 50);
            $table->char('genero', 50);
            $table->integer('telefone')->unsigned();
            $table->string('departamento', 50);
            $table->string('funcao', 50);
            $table->string('local_trabalho', 50);
            $table->float('faixa_salarial', 8,2);
            $table->string('imagem', 30);
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
