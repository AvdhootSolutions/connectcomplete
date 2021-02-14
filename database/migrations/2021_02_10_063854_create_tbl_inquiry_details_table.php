<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblInquiryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_inquiry_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('inquiry_id')->unsigned()->nullable();
            $table->unsignedBigInteger('cat_id')->unsigned()->nullable();
            $table->unsignedBigInteger('subcat_id')->unsigned()->nullable();
            $table->unsignedBigInteger('childcat_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('inquiry_id')->references('id')->on('tbl_inquiries')->onDelete('cascade');
            $table->foreign('cat_id')->references('id')->on('tbl_categories')->onDelete('cascade');
            $table->foreign('subcat_id')->references('id')->on('tbl_subcategories')->onDelete('cascade');
            $table->foreign('childcat_id')->references('id')->on('tbl_child_category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_inquiry_details');
    }
}
