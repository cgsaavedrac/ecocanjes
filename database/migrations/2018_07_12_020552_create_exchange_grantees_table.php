<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangeGranteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_grantees', function (Blueprint $table) {
            $table->increments('id');
            //FK user_id
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('grantee_id')->unsigned();
            $table->foreign('grantee_id')->references('id')->on('grantees');

            $table->float('quantity_eco');
            $table->float('clp');
            $table->dateTime('transaction_date');
            $table->string('status')->default('Abierto'); //Abierto / Cerrado
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
        Schema::dropIfExists('exchange_grantees');
    }
}
