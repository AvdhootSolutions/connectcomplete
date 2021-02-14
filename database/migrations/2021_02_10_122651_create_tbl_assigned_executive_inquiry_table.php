<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAssignedExecutiveInquiryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_assigned_executive_inquiry', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('inquiry_id')->unsigned()->nullable();
            $table->unsignedBigInteger('executive_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('inquiry_id')->references('id')->on('tbl_inquiries')->onDelete('cascade');
            $table->foreign('executive_id')->references('id')->on('tbl_executive')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_assigned_executive_inquiry');
    }
}
