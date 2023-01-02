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
        Schema::create('assign_units', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id');
            $table->integer('year_id');
            $table->integer('unit_id');
            $table->double('full_mark');
            $table->double('pass_mark');
            $table->double('subjective_mark');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assign_units');
    }
};
