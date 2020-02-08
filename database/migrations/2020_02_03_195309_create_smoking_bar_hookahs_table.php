<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmokingBarHookahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smoking_bar_hookahs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('smoking_bar_id')->unsigned();
            $table->foreign('smoking_bar_id')->references('id')->on('smoking_bars');
            $table->bigInteger('hookah_id')->unsigned();
            $table->foreign('hookah_id')->references('id')->on('hookahs');
            $table->smallInteger('hookahs_count')->unsigned();
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
        Schema::dropIfExists('smoking_bar_hookahs');
    }
}
