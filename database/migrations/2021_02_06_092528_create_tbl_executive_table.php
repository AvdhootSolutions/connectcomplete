<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblExecutiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_executive', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('city_admin_id')->unsigned()->nullable();
            $table->unsignedBigInteger('city_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('designation');
            $table->string('mobile_number');
            $table->string('profile_pic');
            $table->string('goverment_proff');
            $table->string('police_verification');
            $table->string('experience');
            $table->string('remarks');
            $table->timestamps();
            $table->foreign('city_admin_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_executive');
    }
}
