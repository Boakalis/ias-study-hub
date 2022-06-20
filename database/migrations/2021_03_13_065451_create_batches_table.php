<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('series_id')->nullable();
            $table->float('price')->nullable();
            $table->float('discount')->default(0)->nullable();
            $table->longText('description')->nullable();
            $table->integer('status')->nullable();
            $table->integer('testcount')->nullable();
            $table->string('usercount')->nullable();
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
        Schema::dropIfExists('batches');
    }
}
