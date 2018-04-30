<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_subcategory');
            $table->integer('id_category');
            $table->string('name', 100);
            $table->string('filename', 150);
            $table->text('description');
            $table->tinyInteger('position');
            $table->tinyInteger('hidden');
            $table->integer('added_by');
            $table->integer('changed_by');
            $table->time('last_change');
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
        Schema::dropIfExists('files');
    }
}
