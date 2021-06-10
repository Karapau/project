<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstatisticaDiariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estatistica_diarias', function (Blueprint $table) {
            $table->id();
            $table->string('especie');            
            $table->unsignedBigInteger('porto_id');
            $table->foreign('porto_id')->references('id')->on('portos')->onDelete('cascade');
    
            $table->string('preco_minimo');
            $table->string('preco_medio');
            $table->string('preco_maximo');
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
        Schema::dropIfExists('estatistica_diarias');
    }
}
