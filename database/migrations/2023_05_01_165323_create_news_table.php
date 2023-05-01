<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title_fa',200)->unique();
            $table->string('description_fa',200)->nullable();
            $table->text('content_fa')->nullable();
            $table->string('image')->default('no-image.png');
            $table->string('title_en',200)->unique();
            $table->string('description_en',200)->nullable();
            $table->text('content_en')->nullable();
            $table->unsignedBigInteger('festival_id')->nullable();
            $table->foreign('festival_id')->on('festivals')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('insert_user_id')->nullable();
            $table->foreign('insert_user_id')->on('users')->references('id')->onDelete('cascade');
            $table->string('date_fa')->nullable();
            $table->string('time_fa')->nullable();
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
        Schema::dropIfExists('news');
    }
}
