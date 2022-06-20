<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreviousYearSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previous_year_subjects', function (Blueprint $table) {

            $table->id();
            $table->string('name')->unique();
            $table->string('price')->nullable();
            $table->string('status');
            $table->string('categorycount')->nullable();
            $table->string('usercount')->nullable();
            $table->string('image')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('previous_year_subjects');
    }
}
