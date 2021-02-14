<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCorporateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_corporate_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile_number');
            $table->unsignedBigInteger('city_id')->unsigned()->nullable();
            $table->string('registered_office_address')->nullable();
            $table->string('billing_address')->nullable();
            $table->integer('is_same_billing_address')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('organisation_billing_name')->nullable();
            $table->string('gst_number')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('company_logo')->nullable();
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
        Schema::dropIfExists('tbl_corporate_users');
    }
}
