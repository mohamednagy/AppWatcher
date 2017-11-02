<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('log_id');
            $table->foreign('log_id')
                    ->references('id')
                    ->on('logs')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->unsignedInteger('tag_id');
            $table->foreign('tag_id')
                    ->references('id')
                    ->on('tags')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('log_tag');
    }
}
