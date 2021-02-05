<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWorkingStageToTblChildCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_child_category', function (Blueprint $table) {
            $table->integer('working_stage')->nullable();
            $table->string('service_cost')->nullable();
            $table->string('minimum_cost')->nullable();
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
            $table->integer('working_stage');
            $table->string('service_cost');
            $table->string('minimum_cost');
        });
    }
}
