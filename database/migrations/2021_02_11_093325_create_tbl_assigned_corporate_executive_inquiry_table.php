<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAssignedCorporateExecutiveInquiryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_assigned_corporate_executive_inquiry', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('inquiry_id')->unsigned()->nullable();
            $table->unsignedBigInteger('corporate_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('inquiry_id')->references('id')->on('tbl_inquiries')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_assigned_corporate_executive_inquiry');
    }
}
