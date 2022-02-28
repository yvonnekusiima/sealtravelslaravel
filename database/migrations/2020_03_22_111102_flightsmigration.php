<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Flightsmigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onewayflights', function (Blueprint $table)
        {
            $table->increments('Id');
            $table->string('Name');
            $table->string('Email');
            $table->string('TripType');
            $table->string('LeavingFrom');
            $table->string('GoingTo');
            $table->string('Departing');
            $table->string('Adults');
            $table->string('Children');
            $table->string('FlightType');
            $table->string('Airline');
            $table->string('TravelClass');
            $table->string('Amount');
        });

        Schema::create('roundtripflights', function (Blueprint $table)
        {
            $table->increments('Id');
            $table->string('Name');
            $table->string('Email');
            $table->string('TripType');
            $table->string('LeavingFrom');
            $table->string('GoingTo');
            $table->string('Departing');
            $table->string('Returning');
            $table->string('Adults');
            $table->string('Children');
            $table->string('FlightType');
            $table->string('Airline');
            $table->string('TravelClass');
            $table->string('Amount');
        });

        Schema::create('flightpayments', function (Blueprint $table)
        {
            $table->increments('Id');
            $table->string('Name');
            $table->string('Email');
            $table->string('PaymentMethod');
            $table->string('CardNumber');
            $table->string('CVV');
            $table->string('ExpiryDate');
            $table->string('Amount');
        });

        Schema::create('flighttickets', function (Blueprint $table)
        {
            $table->increments('Id');
            $table->string('Name');
            $table->string('FlightNumber');
            $table->string('TravelClass');
            $table->string('CheckinOpens');
            $table->string('Status');
            $table->string('Departure');
            $table->string('Arrival');
            $table->string('DepartingFrom');
            $table->string('DepartureAirportandTerminal');
            $table->string('ArrivingAt');
            $table->string('ArrivalAirportandTerminal');
            $table->string('Barcode');
            $table->string('TicketValidity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('onewayflights');
        Schema::dropIfExists('roundtripflights');
        Schema::dropIfExists('flightpayments');
        Schema::dropIfExists('flighttickets');
    }
}
