<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStateIdUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('designation')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('remarks')->nullable();
            $table->string('profile_image')->nullable();
            $table->unsignedBigInteger('state_id')->unsigned()->nullable();
            $table->unsignedBigInteger('city_id')->unsigned()->nullable();
            $table->foreign('state_id')->references('id')->on('tbl_states')->onDelete('cascade');
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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
