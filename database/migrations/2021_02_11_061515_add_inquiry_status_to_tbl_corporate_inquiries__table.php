<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInquiryStatusToTblCorporateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_corporate_inquiries', function (Blueprint $table) {
             
            $table->enum('inquiry_status', ['0','1','2','3','4'])->default('0')->comment('0 =Open 1=Close (by CLient /  by Admin) 2 = Succesfully Completed 3=ASSIGN TO EXECUTIVE 4 = ASSIGN TO CREW ');
            $table->enum('inquiry_stage', ['0','1','2','3'])->default('0')->comment('0 =Pending 1=Completed  2 = Executive 3=Crew ');
            $table->integer('inquiry_sub_stage')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_corporate_inquiries', function (Blueprint $table) {
             $table->enum('inquiry_status', ['0','1','2','3','4'])->default('0')->comment('0 =Open 1=Close (by CLient /  by Admin) 2 = Succesfully Completed 3=ASSIGN TO EXECUTIVE 4 = ASSIGN TO CREW ');
            $table->enum('inquiry_stage', ['0','1','2','3'])->default('0')->comment('0 =Pending 1=Completed  2 = Executive 3=Crew ');
            $table->integer('inquiry_sub_stage')->default('0');
        });
    }
}
