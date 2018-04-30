<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id_author');
            $table->integer('user_id_receiver');
            $table->text('task');
            $table->text('comment');
            $table->time('start_date');
            $table->time('end_date');
            $table->time('completed_date');
            $table->integer('1st_read');
            $table->integer('read_count');
            $table->text('author_comment');
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
        Schema::dropIfExists('user_tasks');
    }
}
