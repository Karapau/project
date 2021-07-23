<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletComsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_coms', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('comprador_id');
            $table->integer('pescador_id');
            $table->integer('product_id');
            $table->integer('order_id');
            $table->string('total');
            $table->string('value');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('wallet_coms');
    }
}
