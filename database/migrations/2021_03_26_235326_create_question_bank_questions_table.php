<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionBankQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_bank_questions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('subject_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('type');
            $table->string('duration');
            $table->string('mark');
            $table->string('negativemark')->nullable();
            $table->string('status')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('question_bank_questions');
    }
}
