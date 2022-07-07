
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestOrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\DailyQuizController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\QuestionBankController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PreviousYearController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* start User Login Routes*/

Route::get('/referer-dashboard',[App\Http\Controllers\HomeController::class, 'refererLogin'])->name('refererLogin');
Route::post('/referer-dashboard',[App\Http\Controllers\HomeController::class, 'refererSignin'])->name('refererSignin');

Route::group(['middleware' => ('analytics')], function () {


Route::get('/',[App\Http\Controllers\HomeController::class, 'home'])->name('index');
Route::get('/verify-otp',[App\Http\Controllers\HomeController::class, 'otp'])->name('otp');
Route::get('/login-with-email',[App\Http\Controllers\HomeController::class, 'loginWithMail'])->name('loginWithMail');
Route::get('/register-with-mail',[App\Http\Controllers\HomeController::class, 'registerWithMail'])->name('registerWithMail');
Route::get('/login-with-otp',[App\Http\Controllers\HomeController::class, 'verifyOTP'])->name('loginWithOTP');
Route::get('/reset-password-mail-link',[App\Http\Controllers\HomeController::class, 'forgotPassword'])->name('forgotPasswordLink');
Route::get('/get-profle-details',[App\Http\Controllers\HomeController::class, 'profileDetails'])->name('profileDetails');


Route::match(['get', 'post'], '/login', [App\Http\Controllers\HomeController::class, 'home'])
    ->name('login');
Route::match(['get', 'post'], '/register', [App\Http\Controllers\HomeController::class, 'home'])
    ->name('register');


Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

/* End User Login Routes*/
Route::get('/reset-password', function () {
    return view('auth.passwords.reset-success');
});

Route::post('/email/verification-notification', [App\Http\Controllers\Auth\VerificationController::class, 'store'])
    ->middleware(['auth', 'throttle:3,1'])
    ->name('verification.send');

/* Route::get('/terms-conditions', function () {
    return view('website.terms');
})
    ->name('terms-conditions'); */

Route::get('auth/facebook', [App\Http\Controllers\Auth\LoginController::class, 'facebooklogin'])
    ->name('facebooklogin');

Route::get('auth/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'facebookcallback'])
    ->name('facebookcallback');

//Google Login
Route::get('auth/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('googlelogin');
Route::get('auth/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback'])->name('handlecallback');

Auth::routes(['verify' => true]);




// Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

/* Download Schedule */
Route::get('/download/{id}', [DownloadController::class, 'download'])
    ->name('download');

//IAS test Series
// Route::get('/ias-test-series', [App\Http\Controllers\TestOrderController::class, 'testseries'])
//     ->name('test-series');
// Route::get('/ias-test-series/{series_slug?}/{batch_slug?}/{test_slug?}', [App\Http\Controllers\TestOrderController::class, 'testoverview'])->name('testoverview');

// //previous year
// Route::get('/previous-year-questions', [PreviousYearController::class, 'index'])->name('previousYearIndex');
// Route::get('/previous-year-questions/{category?}/{sub_category?}/{test_slug?}', [PreviousYearController::class, 'testIndex'])->name('previousYearTestIndex');
// Route::get('pyq/courses', [PreviousYearController::class, 'courses'])->name('pyq-course-list');

//Question bank

Route::get('/question-banks', [QuestionBankController::class, 'bankIndex'])->name('questionBankIndex');
Route::get('/question-banks/{category?}/{sub_category?}/{test_slug?}', [QuestionBankController::class, 'getQuestionBankPages'])->name('getQuestionBankPages');
Route::get('qb/courses', [QuestionBankController::class, 'courses'])->name('qb-course-list');
//daily Quiz
Route::get('/daily-quiz', [DailyQuizController::class, 'index'])->name('dailyQuizIndex');
Route::get('/get-daily-quiz-month/{year?}', [DailyQuizController::class, 'getDailyQuizMonth'])->name('getDailyQuizMonth');
Route::get('/get-daily-list/{year?}/{month?}', [DailyQuizController::class, 'getDailyQuizList'])->name('getDailyQuizList');

//FAQ
Route::get('/faq',[App\Http\Controllers\HomeController::class, 'faq'])->name('faq');
Route::get('/get-category-faq',[App\Http\Controllers\HomeController::class, 'getCategoryFaq'])->name('getCategoryFaq');

//Contact
Route::get('contact',[App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::post('contact/save',[App\Http\Controllers\HomeController::class, 'saveContact'])->name('saveContact');

//About Us
Route::get('about-us',[App\Http\Controllers\HomeController::class, 'aboutUs'])->name('about-us');

Route::middleware(['auth'])->group(function () {
    //User Dashboard
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('dashboard');
    //profiles
    Route::get('/my-profile', [App\Http\Controllers\UserController::class, 'index'])
        ->name('myprofile');
    Route::get('/my-courses', [App\Http\Controllers\TestOrderController::class, 'myorder'])
        ->name('myorder');
    Route::get('/ias-series-reports', [App\Http\Controllers\TestOrderController::class, 'mytest'])
        ->name('mytest');
    Route::get('/previous-year-question-reports', [TestOrderController::class, 'pyqreport'])
        ->name('pyqreport');
    Route::get('/question-bank-reports', [TestOrderController::class, 'qbreport'])
        ->name('qbreport');
    Route::get('/settings', [App\Http\Controllers\UserController::class, 'settings'])
        ->name('settings');
    Route::post('/check-current-pwd', [App\Http\Controllers\UserController::class, 'chkCurrentPassword'])
        ->name('user-check-pwd');

    //IAS test-series
    Route::get('/test-page/{parameter}', [App\Http\Controllers\TestOrderController::class, 'testpage'])
        ->name('testpage');
    Route::post('/updatesection/{id}', [App\Http\Controllers\TestOrderController::class, 'sessionupdate'])
        ->name('sessionupdate');
    Route::get('/show-report/{id}', [TestOrderController::class, 'reportShow'])
        ->name('show_report');
    Route::get('/show-report-testindex/{id}', [TestOrderController::class, 'reportShowTestIndex'])
        ->name('show.report.testindex');
    Route::get('/show-solution/{parameter}', [TestOrderController::class, 'solutionShow'])
        ->name('show_solution');


    Route::get('/ias-test-series/series/{slug}', [App\Http\Controllers\TestOrderController::class, 'seriesbatch'])->name('seriesbatch');

    //profile-address-password-update
    Route::get('/password-change', [App\Http\Controllers\UserController::class, 'passwordchange'])
        ->name('password-change');
    Route::post('/password-update', [App\Http\Controllers\UserController::class, 'passwordupdate'])
        ->name('password-update');
    Route::post('/profile-update', [App\Http\Controllers\UserController::class, 'profileupdate'])
        ->name('profile-update');
    Route::post('/profile-address-update', [App\Http\Controllers\UserController::class, 'addressupdate'])
        ->name('profile-address-update');
    Route::post('/image-update', [App\Http\Controllers\UserController::class, 'profileImageUpdate'])
        ->name('image-update');

    //checkoutpage
    Route::post('/payment/pay-success', [App\Http\Controllers\PaymentController::class, 'paysuccess'])->name('paysuccess');
    Route::post('/buyany-question-bank', [App\Http\Controllers\PaymentController::class, 'newQuestionBank'])->name('buyAny');
    Route::post('/buyany-previous-year-question', [App\Http\Controllers\PaymentController::class, 'newPYQ'])->name('buyAnyPYQ');
    Route::get('/payment/thank-you/{encrypted_id}/{order_id}', [App\Http\Controllers\PaymentController::class, 'thankyou'])
        ->name('thankyou');
    Route::get('/payment-confirmation/thank-you-for-purchase/{razorpay_id}', [App\Http\Controllers\PaymentController::class, 'pyq_thank_you'])
        ->name('pyq_thankyou');
    Route::get('/thank-you-for-prime-purchase/{order_id}', [App\Http\Controllers\PaymentController::class, 'premiumthankyou'])
        ->name('thankyou.premium');
    Route::get('/thank-you-for-order/{razorpay_id}', [App\Http\Controllers\PaymentController::class, 'qb_thank_you'])
        ->name('qb_thankyou');
    Route::post('/payment/pay-failure', [App\Http\Controllers\PaymentController::class, 'payfailure'])
        ->name('payfailure');
    Route::post('/payment/premium', [App\Http\Controllers\PaymentController::class, 'premium'])
        ->name('premiumorder');

    //Create Order
    Route::post('/order/create', [App\Http\Controllers\PaymentController::class, 'createOrder'])
        ->name('createOrder');
    Route::post('new-payment-type/order/create', [App\Http\Controllers\PaymentController::class, 'newPaymentCreateOrder'])
        ->name('checkboxMethodPayment');

    //get states by country

    Route::get('/get-states-by-country', [App\Http\Controllers\CountryStateCityController::class, 'getState'])
        ->name('getStatesByCountry');
    Route::post('/get-states-by-country', [App\Http\Controllers\CountryStateCityController::class, 'getState'])
        ->name('getStatesByCountry');
    Route::post('/get-cities-by-state', [App\Http\Controllers\CountryStateCityController::class, 'getCity'])->name('getCitiesByState');

    //Exam-Submit
    Route::get('/examSubmit', [TestOrderController::class, 'examSubmit']);

    //Question Bank
    Route::get('/question-bank/{encrypted_id?}/show-solution', [QuestionBankController::class, 'questionBankTestSolutionShow'])->name('questionBankTestSolutionShow');
    Route::get('/home/question-bank/test-page/{encrypted_id}', [QuestionBankController::class, 'testpage'])->name('questionBankTestPage');
    Route::post('/home/question-bank/test-page/result-update/{id}', [QuestionBankController::class, 'resultUpdate'])->name('resultUpdate');

    //Pdf-Generate Route
    Route::get('/generate-pdf/{parameter}/{encrypted_user_id}', [PdfController::class, 'generatePDF'])->name('generatePDF');

    //Previou Year Questions
    Route::get('/previous-year-questions/{encrypted_id?}/show-solution', [PreviousYearController::class, 'previousYearTestSolutionShow'])->name('previousYearTestSolutionShow');
    Route::get('/previous-year-questions/test-page/{encrypted_id}', [PreviousYearController::class, 'testPage'])->name('previousYearTestPage');
    Route::post('/previous-year-questions/test-page/result-update/{id}', [PreviousYearController::class, 'resultUpdate'])->name('previousResultUpdate');


    //Daily Quiz
    Route::get('/daily-quiz/test-page/{id}', [DailyQuizController::class, 'testpage'])->name('quizTestPage');
    Route::get('/daily-quiz/show-solutions/{id}', [DailyQuizController::class, 'showSolutions'])->name('quizshowSolutions');

    Route::get('/daily-quiz/test-index/{yearMonth}', [DailyQuizController::class, 'testindex'])->name('show-test');

    Route::post('/daily-quiz/test-submit/{id}', [DailyQuizController::class, 'resultUpdate'])->name('quizsubmit');
});


Route::get('/{slug}',[App\Http\Controllers\HomeController::class, 'getPage'])->name('getPage');
});
