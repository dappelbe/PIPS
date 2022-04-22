<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studydetails', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('studyname');
            $table->text('apiurl');
            $table->text('apikey');
            $table->text('studylogo');
            $table->text('studyemail');
            $table->text('studyphone');
            $table->text('studyaddress');
            $table->text('studyaccruallink');
            $table->boolean('uploadedpis');
            $table->integer('studyrandomisationreportid');
            $table->text('randonumfield');
            $table->text('allocationfield');
            $table->text('sitenamefield');
            $table->integer('studystatusreportid');
            $table->integer('expectedrecruits');
            $table->text('randodatefield');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studydetails');
    }
};
