<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id');
            $table->string('code', 15);
            $table->integer('category');
            $table->integer('subcategory');
            $table->string('name', 150);
            $table->mediumText('images');
            $table->decimal('aquisition_price', 10, 2);
            $table->decimal('sell_price', 10, 2);
            $table->string('currency', 3);
            $table->string('discount', 50);
            $table->string('size', 10);
            $table->string('sizes', 224);
            $table->string('colors', 224);
            $table->integer('quantity');
            $table->mediumText('description');
            $table->mediumText('tags');
            $table->integer('same');
            $table->tinyInteger('special');
            $table->integer('show');
            $table->integer('display_order');
            $table->integer('added_by');
            $table->time('last_updated');
            $table->time('last_visited');
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
        Schema::dropIfExists('products');
    }
}
