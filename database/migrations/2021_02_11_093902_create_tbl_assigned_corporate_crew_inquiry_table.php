<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAssignedCorporateCrewInquiryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_assigned_corporate_crew_inquiry_table', function (Blueprint $table) {
            $table->unsignedBigInteger('inquiry_id')->unsigned()->nullable();
            $table->unsignedBigInteger('corporate_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('inquiry_id')->references('id')->on('tbl_corporate_inquiries')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_assigned_corporate_crew_inquiry_table');
    }
}
