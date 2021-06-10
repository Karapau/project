<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('adress');
            $table->string('payment_mothod');
            $table->string('shipping_mothod');
            $table->integer('user_id');
            $table->string('user_name');
            $table->string('email');
            $table->string('telemovel');
            $table->string('total');
            $table->string('sub_total');
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
        Schema::dropIfExists('user_orders');
    }
}
