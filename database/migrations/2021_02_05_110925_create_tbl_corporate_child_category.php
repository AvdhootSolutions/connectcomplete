<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCorporateChildCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_corporate_child_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('child_category_name');
            $table->string('child_category_image');
            $table->unsignedBigInteger('subcategory_id')->unsigned()->nullable();
            $table->integer('sorting_number');
            $table->integer('remarks');
            $table->integer('working_stage')->nullable();
            $table->string('service_cost')->nullable();
            $table->string('minimum_cost')->nullable();
            $table->timestamps();
 
            $table->foreign('subcategory_id')->references('id')->on('tbl_corporate_sub_categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_corporate_child_category');
    }
}
