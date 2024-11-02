<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionRefereeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competition_referee', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competiton_id')->constrained()->onDelete('cascade');
            $table->foreignId('refereeing_id')->constrained()->onDelete('cascade');
            $table->integer('score')->nullable(); // امتیاز داور
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
        Schema::dropIfExists('competition_referee');
    }
}
