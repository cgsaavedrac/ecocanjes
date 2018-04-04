<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecyclingRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recycling_records', function (Blueprint $table) {
            $table->increments('id');
            //FK machine_id
            $table->integer('machine_id')->unsigned();
            $table->foreign('machine_id')->references('id')->on('machines');
            //FK user_id
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('bar_code');
            $table->float('quantity', 10, 0);
            $table->dateTime('recycling_date');
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
        Schema::dropIfExists('recycling_records');
    }
}
