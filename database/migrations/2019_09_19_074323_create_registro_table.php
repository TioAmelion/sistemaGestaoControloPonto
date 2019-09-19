<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('func_id')->unsigned();
            $table->foreign('func_id')->references('id')->on('funcionario')->onDelete('cascade');
            $table->date('data');
            $table->time('entrada')->nullable();
            $table->time('saida_a')->nullable();
            $table->time('entrada_a')->nullable();
            $table->time('saida')->nullable();
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
        Schema::dropIfExists('registro');
    }
}
