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
        Schema::create('study_visit_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('study_id');
            $table->string('visit_display_name');
            $table->string('visit_event_name');
            $table->integer('offset');
            $table->integer('range');
            $table->text('comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study_visit_details');
    }
};
