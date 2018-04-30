<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->string('fullname', 150);
            $table->string('address', 255);
            $table->string('phone', 30);
            $table->string('email', 150);
            $table->integer('total');
            $table->string('value');
            $table->integer('status');
            $table->text('invoice_private');
            $table->text('invoice_company');
            $table->string('other_info', 255);
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
        Schema::dropIfExists('orders');
    }
}
