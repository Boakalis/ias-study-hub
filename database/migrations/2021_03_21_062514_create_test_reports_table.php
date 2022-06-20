<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id')->comment('1:ias;2:question bank  ;3: previous year question ');
            $table->string('batch_id')->nullable();
            $table->string('test_id');
            $table->string('date');
            $table->string('type');
            $table->string('user_id');
            $table->string('correct')->nullable();
            $table->string('incorrect')->nullable();
            $table->string('unattempt')->nullable();
            $table->string('review')->nullable();
            $table->string('total_marks')->nullable();
            $table->string('positive_mark')->nullable();
            $table->string('negative_mark')->nullable();
            $table->string('marks_obtained')->nullable();
            $table->longText('question_html')->nullable();
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
        Schema::dropIfExists('test_reports');
    }
}
