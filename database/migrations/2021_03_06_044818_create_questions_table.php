<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('subject_id')->nullable();
            $table->longtext('question')->nullable();
            $table->longtext('option_1')->nullable();
            $table->longtext('option_2')->nullable();
            $table->longtext('option_3')->nullable();
            $table->longtext('option_4')->nullable();
            $table->longtext('option_5')->nullable();
            $table->longtext('option_6')->nullable();
            $table->longtext('answers')->nullable();
            $table->longtext('explanation')->nullable();
            $table->longtext('hint')->nullable();
            $table->integer('status')->comment('0 = inactive,1 = active')->default(1);
            $table->integer('level')->comment('1 = easy,2 = medium, 3= hard')->nullabel();
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
        Schema::dropIfExists('questions');
    }
}
