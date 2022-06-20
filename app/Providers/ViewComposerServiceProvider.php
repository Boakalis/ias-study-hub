<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Admin\QuestionBankSubject;
use App\Models\SettingGeneral;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer(['website.Layout.sidebar'],function($view){
                        $categories = QuestionBankSubject::active()->get();
                        $view->with(compact('categories'));
        });
        View::composer(['website.Layout.header','website.TestLayout.master ','website.Layout.master','website.Layout.sidebar','mail.result','admin.layouts.sidebar','admin.layouts.header','admin.layouts.master','admin.new-login','website.Users.IAS.testoverview','website.question-bank.index','website.question-bank.test-index','website.previous-year-question.test-index','website.previous-year-question.category-index','website.website-layout.header','website.website-layout.master','auth.passwords.reset','website.premium-payment-thankyou'],function($view){
                        $globalSettings = SettingGeneral::first();
                        $view->with(compact('globalSettings'));
        });

    }
}
