<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especies', function (Blueprint $table) {
            $table->id();
            $table->string('nome_portugues');
            $table->string('nome_ingles')->nullable();
            $table->string('nome_espanhol')->nullable();
            $table->string('nome_cientifico')->nullable();
            $table->string('codigo_fao')->nullable();
            $table->string('codigo_lota')->nullable();
            $table->string('tamanho_minimo')->nullable();
            $table->string('margem')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('especies');
    }
}
