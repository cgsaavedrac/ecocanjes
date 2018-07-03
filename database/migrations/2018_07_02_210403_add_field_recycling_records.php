<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldRecyclingRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recycling_records', function ($table) {
        $table->boolean('recycling_type'); //1PET 0 LATA
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recycling_records', function ($table) {
        $table->dropColumn([
            'recycling_type',
        ]);
        });
    }
}
