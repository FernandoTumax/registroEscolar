<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('punteo_final');
            $table->integer('punteo_neto');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('bimestre_id');
            $table->foreign('student_id')->references('id')->on('Students')->onDelete('set null');
            $table->foreign('bimestre_id')->references('id')->on('Bimestres')->onDelete('cascade');
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
}
