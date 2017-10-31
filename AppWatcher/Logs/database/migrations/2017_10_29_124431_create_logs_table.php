<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('app_id');
            $table->foreign('app_id')
                    ->references('id')
                    ->on('apps')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->text('log');
            $table->tinyInteger('type')->comment('0 error, 1 warning, 2 info');
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
        Schema::dropIfExists('logs');
    }
}
