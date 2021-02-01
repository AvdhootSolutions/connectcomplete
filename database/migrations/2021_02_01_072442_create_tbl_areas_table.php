<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAreasTable extends Migration
{
    
    public function up()
    {
        Schema::create('tbl_areas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('state_id')->unsigned()->nullable();
            $table->unsignedBigInteger('city_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('state_id')->references('id')->on('tbl_states')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('tbl_cities')->onDelete('cascade');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('tbl_areas');
    }
}
