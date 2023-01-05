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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->integer('weekday');
            $table->time('start_time')->format('H:i');
            $table->time('end_time')->format('H:i');
            $table->foreignId('course_unit_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('lecturer_id');
            $table->foreign('lecturer_id', 'lec_fk_101010')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id', 'room_fk_101010')->references('id')->on('rooms')->onDelete('cascade');
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
        //
    }
};
