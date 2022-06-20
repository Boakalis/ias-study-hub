<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('duration');
            $table->timestamp('date')->nullable();
            $table->time('time')->nullable();
            $table->string('mark');
            $table->string('status');
            $table->string('slug');
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
        Schema::dropIfExists('daily_quizzes');
    }
}
