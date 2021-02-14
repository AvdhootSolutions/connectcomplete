<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_inquiries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');       
            $table->unsignedBigInteger('user_id')->unsigned()->nullable();
            $table->unsignedBigInteger('city_id')->unsigned()->nullable();
            $table->string('area_id');
            $table->string('full_address');
            $table->time('prefer_time');
            $table->date('prefer_date');
            $table->string('remarks');
            $table->date('inquiry_date');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('tbl_individual_users')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('tbl_cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_inquiries');
    }
}
