<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenamePriceIdToPriceInTripPassengerPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trip_passenger_price', function (Blueprint $table) {
            $table->renameColumn('price_id', 'price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trip_passenger_price', function (Blueprint $table) {
            $table->renameColumn('price', 'price_id');
        });
    }
}
