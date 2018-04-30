<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoldProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sold_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('shop_id');
            $table->integer('client_id');
            $table->string('code', 15);
            $table->integer('category');
            $table->string('name', 150);
            $table->mediumText('images');
            $table->float('acqusition_price');
            $table->float('sell_price');
            $table->string('size', 10);
            $table->integer('quantity');
            $table->mediumText('description');
            $table->tinyInteger('special');
            $table->tinyInteger('payment_type');
            $table->string('payment_id', 40);
            $table->integer('sold_by');
            $table->time('last_update');
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
        Schema::dropIfExists('sold_products');
    }
}
