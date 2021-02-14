<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblIndividualAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_individual_area', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('individual_id')->unsigned()->nullable();
            $table->unsignedBigInteger('city_id')->unsigned()->nullable();
            $table->unsignedBigInteger('area_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('individual_id')->references('id')->on('tbl_individual_users')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('tbl_cities')->onDelete('cascade');
            $table->foreign('area_id')->references('id')->on('tbl_areas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_individual_area');
    }
}
