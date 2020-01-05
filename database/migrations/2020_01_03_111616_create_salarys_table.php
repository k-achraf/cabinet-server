<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalarysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salarys', function (Blueprint $table) {
            $table->increments('salary_id');
            $table->integer('salary_value')->default(0);
            $table->integer('month_id')->unsigned();
            $table->integer('employe_id')->unsigned();
            $table->foreign('month_id')->references('month_id')->on('months');
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
        Schema::dropIfExists('salarys');
    }
}
