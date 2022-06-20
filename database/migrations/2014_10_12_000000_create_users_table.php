<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('userID')->nullable();
            $table->string('idProof')->nullable();
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->string('phone_verified_at')->nullable();
            $table->string('image')->nullable();
            $table->timestamp('dob')->nullable();
            $table->tinyInteger('gender')->default(1)->comment('1:male;2:female');
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('city_id')->nullable();
            $table->unsignedInteger('state_id')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->string('password')->nullable();
            $table->string('facebookId')->nullable();
            $table->string('googleId')->nullable();
            $table->string('otp')->nullable();
            $table->string('fullname')->nullable();
            $table->string('status')->default(1)->comment('1:active;0:inactive');
            $table->tinyInteger('theme')->nullable()->comment('1=Light,2=Dark');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
