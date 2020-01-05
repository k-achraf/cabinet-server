<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePourcentagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pourcentages', function (Blueprint $table) {
            $table->increments('pourcentage_id');
            $table->string('pourcentage_value');
            $table->integer('service_id')->unsigned();
            $table->integer('employe_id')->unsigned();
            $table->foreign('service_id')->references('service_id')->on('services');
            $table->foreign('employe_id')->references('employe_id')->on('employes');
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
        Schema::dropIfExists('pourcentages');
    }
}
