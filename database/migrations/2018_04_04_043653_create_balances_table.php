<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->increments('id');
            //FK movement_type_id ENTRADA O SALIDA
            $table->integer('movement_type_id')->unsigned();
            $table->foreign('movement_type_id')->references('id')->on('movement_types');
            //FK user_id quien registra la transacción
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            //FK machine_id registra la maquina en donde se hace la transacción
            $table->integer('machine_id')->unsigned();
            $table->foreign('machine_id')->references('id')->on('machines');
            $table->float('mount');
            $table->dateTime('transaction_date');
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
        Schema::dropIfExists('balances');
    }
}
