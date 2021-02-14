<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCorporateInquiriesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_corporate_inquiries_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('corporate_inquiry_id')->unsigned()->nullable();
            $table->unsignedBigInteger('corporate_cat_id')->unsigned()->nullable();
            $table->unsignedBigInteger('corporate_subcat_id')->unsigned()->nullable();
            $table->unsignedBigInteger('corporate_childcat_id')->unsigned()->nullable();
            $table->time('prefer_time');
            $table->date('prefer_date');
            $table->timestamps();
            $table->foreign('corporate_inquiry_id')->references('id')->on('tbl_corporate_inquiries')->onDelete('cascade');
            $table->foreign('corporate_cat_id')->references('id')->on('tbl_corporate_categories')->onDelete('cascade');
            $table->foreign('corporate_subcat_id')->references('id')->on('tbl_corporate_sub_categories')->onDelete('cascade');
            $table->foreign('corporate_childcat_id')->references('id')->on('tbl_corporate_child_category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_corporate_inquiries_details');
    }
}
