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
            $table->integer('option_id')->index('fk_option_user_option1_idx');
            $table->integer('user_id')->index('fk_option_user_user1_idx');

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
