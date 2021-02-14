<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblIndividualUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_individual_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile_number');
            $table->unsignedBigInteger('city_id')->unsigned()->nullable();
            $table->string('address')->nullable();
            $table->string('profile_photo')->nullable();
            $table->enum('status', ['0','1'])->default('0')->comment('0 =Inactive 1=Active');
            $table->foreign('city_id')->references('id')->on('tbl_cities')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_individual_users');
    }
}
