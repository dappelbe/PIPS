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
        Schema::create('consentform', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('pis');
            $table->boolean('voluntary');
            $table->boolean('data');
            $table->boolean('agree');
            $table->text('name');
            $table->date('consentdate');
            $table->text('ppt_signature');
            $table->text('takenby');
            $table->date('checkdate');
            $table->text('research_sig');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consentform');
    }
};
