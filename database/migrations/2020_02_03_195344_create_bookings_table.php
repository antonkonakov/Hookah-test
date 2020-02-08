<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('smoking_bar_hookah_id')->unsigned();
            $table->foreign('smoking_bar_hookah_id')->references('id')->on('smoking_bar_hookahs');
            $table->string('name');
            $table->smallInteger('customers_count')->unsigned();
            $table->dateTime('booking_from');
            $table->dateTime('booking_to');
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
        Schema::dropIfExists('bookings');
    }
}
