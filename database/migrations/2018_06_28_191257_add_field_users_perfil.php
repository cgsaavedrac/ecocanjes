<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldUsersPerfil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
        $table->date('birth_date')->nullable();
        $table->string('sexo')->nullable();
        //FK region_id
        $table->integer('region_id')->unsigned()->nullable();
        $table->foreign('region_id')->references('id')->on('regions');
        //FK city_id
        $table->integer('city_id')->unsigned()->nullable();
        $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
        $table->dropColumn([
            'birth_date',
            'sexo',
            'region_id',
            'city_id',
        ]);
        });
    }
}
