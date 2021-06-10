<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('pescador_id');
            $table->foreign('pescador_id')->references('id')->on('pescadors')->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('especie_id');
            $table->foreign('especie_id')->references('id')->on('especies')->onUpdate('cascade')
            ->onDelete('cascade');
           
            $table->unsignedBigInteger('porto_id');
            $table->foreign('porto_id')->references('id')->on('portos')->onUpdate('cascade')
            ->onDelete('cascade');

            $table->string('embarcacao');
            $table->string('zona')->nullable();
            $table->string('tamanho')->nullable();
            $table->string('arte')->nullable();
            $table->string('quantidade');
            $table->string('unidade')->nullable();
            $table->string('preco')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default(0);

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
        Schema::dropIfExists('produtos');
    }
}
