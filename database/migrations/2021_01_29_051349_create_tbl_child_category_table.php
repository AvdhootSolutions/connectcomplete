<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblChildCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_child_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('child_category_name');
            $table->string('child_category_image');
             $table->unsignedBigInteger('subcategory_id')->unsigned()->nullable();
            $table->integer('sorting_number');
            $table->integer('remarks');
            $table->timestamps();
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
        Schema::dropIfExists('tbl_child_category');
    }
}
