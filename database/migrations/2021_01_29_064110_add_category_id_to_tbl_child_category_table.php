<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToTblChildCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_child_category', function (Blueprint $table) {
             $table->unsignedBigInteger('category_id')->after('child_category_image')->unsigned()->nullable();
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
        Schema::table('tbl_child_category', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
        });
    }
}
