<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyerColectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer_colectives', function (Blueprint $table) {
            $table->id();
            $table->integer('comprador_id')->nullable();
            $table->string('morada')->nullable();
            $table->string('nif')->nullable();
            $table->string('contato')->nullable();
            $table->string('telefone')->nullable();
            $table->string('telemovel_empresa')->nullable();
            $table->string('tipo')->nullable();
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
        Schema::dropIfExists('buyer_colectives');
    }
}
