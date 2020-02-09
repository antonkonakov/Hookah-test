<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHookahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hookahs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('smoking_bar_id')->unsigned()->index();;
            $table->foreign('smoking_bar_id')->references('id')->on('smoking_bars')->onDelete('cascade');
            $table->string('name');
            $table->smallInteger('tubes_count')->unsigned();
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
        Schema::dropIfExists('hookahs');
    }
}
