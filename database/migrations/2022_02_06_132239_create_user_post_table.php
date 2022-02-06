<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_post', function (Blueprint $table){
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('post_id')->unsigned();
            $table->primary(['user_id', 'post_id']);  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_post');
    }
}
