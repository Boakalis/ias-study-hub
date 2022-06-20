<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable();
            $table->string('course_id')->comment('1:IAS; 2:question bank 3:  previous year question ')->nullable();
            $table->string('batch_id')->nullable();
            $table->timestamp('date')->nullable();
            $table->integer('status');
            $table->string('user_id');
            $table->string('amount');
            $table->string('payment_type')->comment('0:cash;1:razorpay')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
