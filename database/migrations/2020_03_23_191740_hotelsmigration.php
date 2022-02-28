<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hotelsmigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotelbooking', function (Blueprint $table)
        {
            $table->increments('Id');
            $table->string('HotelName');
            $table->string('Name');
            $table->string('Email');
            $table->string('Travelers');
            $table->string('Rooms');
            $table->string('RoomType');
            $table->string('CheckIn');
            $table->string('CheckOut');
            $table->string('Amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotelbooking');
    }
}
