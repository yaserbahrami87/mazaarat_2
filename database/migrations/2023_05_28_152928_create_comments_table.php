<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('user_id_answer')->nullable();
            $table->foreign('user_id_answer')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('comment_id')->nullable();
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('type',150)->nullable();
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
        Schema::dropIfExists('comments');
    }
}
