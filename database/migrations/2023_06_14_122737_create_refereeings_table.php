<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefereeingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refereeings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('competiton_id')->nullable();
            $table->foreign('competiton_id')->references('id')->on('competitons')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('festival_id')->nullable();
            $table->foreign('festival_id')->references('id')->on('festivals')->onDelete('cascade');
            $table->tinyInteger('score')->nullable();
            $table->string('date_fa',10)->nullable();
            $table->string('time_fa',6)->nullable();
            $table->string('description', 200)->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('refereeings');
    }
}
