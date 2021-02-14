<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAssignCrewInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_assign_crew_inquiries', function (Blueprint $table) {
             $table->bigIncrements('id');
            $table->unsignedBigInteger('corporate_inquiry_id')->unsigned()->nullable();
            $table->unsignedBigInteger('corporate_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('corporate_inquiry_id')->references('id')->on('tbl_corporate_inquiries')->onDelete('cascade');
            $table->foreign('corporate_id')->references('id')->on('tbl_corporate_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_assign_crew_inquiries');
    }
}
