<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id');
            $table->integer('seller_id');
            $table->string('firstname', 31);
            $table->string('lastname', 31);
            $table->string('password', 255);
            $table->string('phone', 30);
            $table->string('country', 200);
            $table->string('locality', 200);
            $table->string('email', 130);
            $table->string('address', 250);
            $table->time('last_order');
            $table->mediumText('description', 250);
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
        Schema::dropIfExists('clients');
    }
}
