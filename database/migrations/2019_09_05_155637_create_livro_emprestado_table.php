<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivroEmprestadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livro_emprestado', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('usuario_id')->unsigned();
            $table->foreign('usuario_id', 'fk_livroEmprestado_usuario')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');

            $table->bigInteger('livro_id')->unsigned();
            $table->foreign('livro_id', 'fk_livroEmprestado_livro')->references('id')->on('livro')->onDelete('restrict')->onUpdate('restrict');

            $table->boolean('estado');
            $table->Date('data_entregue');
            $table->Date('data_devolucao')->nullable();
            $table->string('emprestado_a', 100);
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
        Schema::dropIfExists('livro_emprestado');
    }
}
