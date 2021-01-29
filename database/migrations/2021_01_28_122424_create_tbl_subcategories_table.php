<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_subcategories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subcategory_name');
            $table->unsignedBigInteger('category_id')->unsigned()->nullable();
            $table->string('subcategory_image');
            $table->integer('sorting_number');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('tbl_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_subcategories');
    }
}
