<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_generals', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('email')->nullable();
            $table->longText('address')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('footer_text')->nullable();
            $table->string('landline')->nullable();
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->string('razorpay_id')->nullable();
            $table->string('razorpay_secret')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('instagram')->nullable();
            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->tinyInteger('is_cookies_enabled')->nullable()->comment('0=No,1=Yes');
            $table->longText('cookies_message')->nullable();
            $table->longText('header_script')->nullable();
            $table->longText('footer_script')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_generals');
    }
}
