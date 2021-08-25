<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->integer('punteo');
            $table->date('date');
            $table->unsignedBigInteger('bimestre_id');
            $table->unsignedBigInteger('course_id');
            $table->foreign('bimestre_id')->references('id')->on('Bimestres');
            $table->foreign('course_id')->references('id')->on('Courses');
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
        Schema::dropIfExists('points');
    }
}
