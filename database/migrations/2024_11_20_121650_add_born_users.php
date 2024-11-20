<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBornUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('gender')->nullable();
            $table->string('datebirth',10)->nullable();
            $table->string('shenasnameh',10)->nullable();
            $table->string('codemelli',11)->nullable();
            $table->string('image',100)->nullable();
            $table->string('education',100)->nullable();
            $table->string('reshteh',100)->nullable();
            $table->string('resume',100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('datebirth');
            $table->dropColumn('shenasnameh');
            $table->dropColumn('codemelli');
            $table->dropColumn('image');
            $table->dropColumn('education');
            $table->dropColumn('reshteh');
            $table->dropColumn('resume');
        });
    }
}
