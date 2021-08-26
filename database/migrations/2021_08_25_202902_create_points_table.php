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
            $table->unsignedBigInteger('bimestre_id')->nullable();
            $table->unsignedBigInteger('activity_id')->nullable();
            $table->foreign('bimestre_id')->references('id')->on('Bimestres');
            $table->foreign('activity_id')->references('id')->on('Activities');
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
