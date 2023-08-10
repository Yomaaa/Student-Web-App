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
        Schema::create('courses', function (Blueprint $table) {
            $table->id('courseId');
            $table->unsignedBigInteger('lecturerId');
            $table->foreign('lecturerId')->references('lecturerId')->on('lecturers');
            $table->string('courseTitle');
            $table->string('courseDesc');
            $table->string('courseCode');
            $table->string('courseSchedule');
            $table->integer('courseProg');
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
        Schema::dropIfExists('courses');
    }
};
