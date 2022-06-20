<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreviousYearTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previous_year_tests', function (Blueprint $table) {
            $table->id();
            $table->integer('subject_id');
            $table->integer('category_id');
            $table->string('name')->unique();
            $table->string('duration');
            $table->string('year');
            $table->integer('status');
            $table->string('slug');
            $table->string('mark');
            $table->string('negativemark')->default(0.6);
            $table->integer('type');
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
        Schema::dropIfExists('previous_year_tests');
    }
}
