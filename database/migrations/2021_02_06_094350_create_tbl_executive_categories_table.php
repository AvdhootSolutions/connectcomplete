<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblExecutiveCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_executive_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('executive_id')->unsigned()->nullable();
            $table->unsignedBigInteger('category_id')->unsigned()->nullable();
            $table->unsignedBigInteger('subcategory_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('executive_id')->references('id')->on('tbl_executive')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('tbl_categories')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('tbl_subcategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_executive_categories');
    }
}
