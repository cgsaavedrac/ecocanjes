<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldMachines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('machines', function ($table) {
        $table->string('latitude');
        $table->string('longitude');
        //FK region_id
        $table->integer('region_id')->unsigned();
        $table->foreign('region_id')->references('id')->on('regions');
        //FK city_id
        $table->integer('city_id')->unsigned();
        $table->foreign('city_id')->references('id')->on('cities');
        $table->string('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('machines', function ($table) {
        $table->dropColumn([
            'latitude',
            'longitude',
            'region_id',
            'city_id',
            'address'
        ]);
        });
    }
}
