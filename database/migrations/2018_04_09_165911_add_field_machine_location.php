<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldMachineLocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('machine_locations', function ($table) {
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
        Schema::table('machine_locations', function ($table) {
            $table->dropColumn([
                'region_id',
                'city_id',
                'address'
            ]);
        });
    }
}
