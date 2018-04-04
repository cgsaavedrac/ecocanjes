<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquivalencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equivalences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unity')->default('ECO'); //Nombre de la Equivalencia ECO
            $table->float('ecopeso');
            $table->float('discount');
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('equivalences');
    }
}
