<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEmployeeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_employee_categories', function (Blueprint $table) {
             $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->unsigned()->nullable();
            $table->unsignedBigInteger('category_id')->unsigned()->nullable();
            $table->unsignedBigInteger('subcategory_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('employee_id')->references('id')->on('tbl_employee')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_employee_categories');
    }
}
