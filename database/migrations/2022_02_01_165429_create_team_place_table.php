<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamPlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     //teamとplaceの多対多の橋渡し・中間テーブルマイグレーション
    public function up()
    {
        Schema::create('team_place', function (Blueprint $table) {
           //team_idとplace_idを外部キーに設定
            $table->bigInteger('team_id')->unsigned(); //teams,placesテーブルのidがbigIncrementであった場合はbigIntegerにする
            $table->bigInteger('place_id')->unsigned();
            $table->primary(['team_id','place_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_place');
    }
}
