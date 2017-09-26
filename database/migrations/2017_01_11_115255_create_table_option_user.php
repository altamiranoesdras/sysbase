<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOptionUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('option_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('option_id')->references('id')->on('options');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_user');
    }
}
