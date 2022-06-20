<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id')->nullable();
            $table->string('order_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('date');
            $table->string('status')->comment('0: Incomplete;  1:complete')->default(1);
            $table->string('amount');
            $table->string('course_id');
            $table->longtext('response')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
