<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
            $table->string('image',200)->nullable();
            $table->unsignedBigInteger('competiton_category_id')->nullable();
            $table->string('description',200)->nullable();
            $table->string('name_place',200)->nullable();
            $table->string('location',200)->nullable();
            $table->string('date_fa',11)->nullable();
            $table->string('time_fa',10)->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('competitons');
    }
}
