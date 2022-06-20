<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\SeriesController;
use App\Http\Controllers\Admin\BatchController;
use App\Http\Controllers\Admin\HelperController;
use App\Http\Controllers\Admin\FilterController;
use App\Http\Controllers\Admin\BulkController;
use App\Http\Controllers\Admin\PreviousYearController;
use App\Http\Controllers\Admin\PreviousYearTestController;
use App\Http\Controllers\Admin\QuestionBankController;
use App\Http\Controllers\Admin\DailyQuizController;
use App\Http\Controllers\Admin\ExamReportController;
use App\Http\Controllers\Admin\SubcsriptionReportController;
use App\Http\Controllers\Admin\UserReportController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\LandingPagesController;
use App\Http\Controllers\Admin\FaqController;
use App\Models\Admin\PreviousYearTest;
use App\Models\Admin\QuestionBankQuestion;

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

Auth::routes();

Route::prefix('/admin')->group(function ()
{

    Route::match(['get', 'post'], '/login', [AdminController::class , 'login'])
        ->name('admin_login');

    Route::group(['middleware' => ['admin']], function ()
    {

        //Dashboard
        Route::get('/dashboard', [AdminController::class , 'dashboard'])
            ->name('admin_dashboard');
        // Route::get('/top-referers', [AdminController::class , 'topReferers'])
        //     ->name('fetchTopReferers');
        //Analytics
        Route::get('/order-details', [AdminController::class , 'orderAnalytics'])
        ->name('order-analytics');
        Route::get('/referral-management', [AdminController::class , 'refererManagement'])
        ->name('referer');
        Route::post('add-referer', [AdminController::class , 'createReferer'])
        ->name('create_referer');
        Route::post('update-referer/{id}', [AdminController::class , 'updateReferer'])
        ->name('updateReferer');
        Route::get('edit-referer/{id}', [AdminController::class , 'editReferer'])
        ->name('edit_referer');

        //Settings
        Route::get('/settings', [AdminController::class , 'settings'])
            ->name('admin_settings');
        Route::get('/payment-settings', [AdminController::class , 'payment'])
            ->name('setting-payment');
        Route::get('/profile', [AdminController::class , 'profile'])
            ->name('profile');
        Route::get('/change_password', [AdminController::class , 'password'])
            ->name('change_password');
        Route::get('/logout', [AdminController::class , 'logout'])
            ->name('admin_logout');
        Route::post('/check-current-pwd', [AdminController::class , 'chkCurrentPassword'])
            ->name('check_pwd');
        Route::post('/update-current-pwd', [AdminController::class , 'updateCurrentPassword'])
            ->name('update_pwd');
        Route::post('/update-profile-data', [AdminController::class , 'updateProfileData'])
            ->name('update_profile');
        Route::post('/razorpay-change', [AdminController::class , 'razorpayKeyChange'])
            ->name('razorpay-change');


        /** Start of Question Management  */

        //Questions
        Route::get('/question-management/questions', [QuestionController::class , 'question'])
            ->name('question');
        Route::post('/question-management/update-question-status', [QuestionController::class , 'updateSQuestionStatus'])
            ->name('update_question_status');
        Route::get('/question-management/questions/create', [QuestionController::class , 'create'])
            ->name('create_question');
        Route::post('/question-management/questions/store', [QuestionController::class , 'questionStore'])
            ->name('store_question');
        Route::post('/question-management/questions/update/{id}', [QuestionController::class , 'updateQuestion'])
            ->name('update_question');
        Route::get('/question-management/questions/edit/{id}', [QuestionController::class , 'editQuestion'])
            ->name('edit_question');
        Route::get('/question-management/show/{id}', [QuestionController::class , 'questionShow'])
            ->name('show_question');
        Route::post('/question-management/delete/{id}', [QuestionController::class , 'deleteQuestion']);
        Route::get('/question-ajax-load', [QuestionController::class , 'datatable_load'])
            ->name('question-ajax-load');
        Route::post('/question-management/delete/{id}', [QuestionController::class , 'deleteQuestion'])
            ->name('delete_question');


        Route::get('/question-bulk-import',[QuestionController::class , 'questionBulkImport'])->name('question-bulk-import');

        //Question Import & Export
        Route::get('importExportView', [BulkController::class , 'importExportView']);
        Route::get('export', [BulkController::class , 'export'])
            ->name('export');
        Route::post('import', [BulkController::class , 'import'])
            ->name('import');

        //Categories
        Route::get('question-management/categories', [SubjectController::class , 'subject'])
            ->name('subject');
        Route::post('question-management/update-subject-status', [SubjectController::class , 'updateSubjectStatus'])
            ->name('update_subject_status');
        Route::get('question-management/categories/create', [SubjectController::class , 'createSubject'])
            ->name('create_subject');
        Route::post('question-management/categories/store', [SubjectController::class , 'subjectStore'])
            ->name('store_subject');
        Route::get('question-management/categories/edit/{id}', [SubjectController::class , 'subjectEdit'])
            ->name('edit_subject');
        Route::post('question-management/categories/update/{id}', [SubjectController::class , 'subjectUpdate'])
            ->name('update_subject');
        Route::post('question-management/categories/delete/{id?}', [SubjectController::class , 'deleteSubject'])
            ->name('delete_subject');

        /** End of Question Management  */

        /** Start of IAS  */

        //Series
        Route::get('/ias/series', [SeriesController::class , 'series'])
            ->name('series');
        Route::get('/ias/series/create', [SeriesController::class , 'createSeries'])
            ->name('create_series');
        Route::get('/ias/series/edit//{id}', [SeriesController::class , 'seriesEdit'])
            ->name('edit_series');
        Route::get('/ias/series/show/{id}', [SeriesController::class , 'seriesShow'])
            ->name('show_series');
        Route::post('/ias/series/store', [SeriesController::class , 'seriesStore'])
            ->name('store_series');
        Route::post('/ias/series/change-status', [SeriesController::class , 'orderchange'])
            ->name('order_change');
        Route::post('/ias/series/update/{id}', [SeriesController::class , 'seriesUpdate'])
            ->name('update_series');
        Route::post('/ias/series/destroy/{id}', [SeriesController::class , 'seriesDestroy'])
            ->name('destroy_series');

        //Batch
        Route::get('/ias/batch', [BatchController::class , 'batch'])
            ->name('batch');
        Route::get('/ias/batch/create', [BatchController::class , 'createBatch'])
            ->name('create_batch');
        Route::get('/ias/batch/edit/{id}', [BatchController::class , 'batchEdit'])
            ->name('edit_batch');
        Route::get('/ias/batch/show/{id}', [BatchController::class , 'batchShow'])
            ->name('show_batch');
        Route::post('/ias/batch/store', [BatchController::class , 'batchStore'])
            ->name('store_batch');
        Route::post('/ias/batch/update/{id}', [BatchController::class , 'batchUpdate'])
            ->name('update_batch');
        Route::post('/ias/batch/destroy/{id}', [BatchController::class , 'batchDestroy'])
            ->name('destroy_batch');
        Route::post('/ias/batch/status/{id}/{type}', [BatchController::class , 'status'])
            ->name('batch_status');

        //Test
        Route::get('/ias/test', [TestController::class , 'test'])
            ->name('test');
        Route::get('/ias/test/create', [TestController::class , 'createTest'])
            ->name('create_test');
        Route::get('/ias/test/edit/{id}', [TestController::class , 'testEdit'])
            ->name('edit_test');
        Route::get('/ias/test/show/{id}', [TestController::class , 'batchShow'])
            ->name('show_test');
        Route::post('/ias/test/store', [TestController::class , 'storeTest'])
            ->name('store_test');
        Route::post('/ias/test/update/{id}', [TestController::class , 'testUpdate'])
            ->name('update_test');
        Route::post('/ias/test/filter', [TestController::class , 'filter'])
            ->name('ias_filter');
            Route::post('/ias/test/update-add/{id}', [TestController::class , 'addTestUpdate'])
            ->name('update_add_test');
        Route::get('/ias/test/edit/{id}/filter', [TestController::class , 'search'])
            ->name('search_test');
        Route::post('/ias/test/destroy/{id}', [TestController::class , 'testDestroy'])
            ->name('destroy_test');
        Route::post('/ias/test/destroy-all/{id}', [TestController::class , 'testDestroyAll'])
            ->name('destroyAll_test');

        /** End of IAS  */


        // OrderPosition-Change
        Route::post('/ias/test/change-order', [TestController::class , 'orderchange'])
            ->name('ias-order-change');
        Route::post('/qb/test/change-order', [QuestionBankController::class , 'orderchange'])
            ->name('qb-order-change');
        Route::post('/pyq/test/change-order', [PreviousYearTestController::class , 'orderchange'])
            ->name('pyq-order-change');


/*         Clone-Module */
        Route::get('/ias/clone-ias-test/{id}', [TestController::class , 'testClone'])
            ->name('clone-ias-test');
        Route::post('/ias/test/store-clone/{id}', [TestController::class , 'storeClone'])
            ->name('clone_test');
        Route::get('/pyq/clone-pyq-test/{id}', [PreviousYearTest::class , 'testClone'])
            ->name('clone-pyq-test');
        Route::post('/pyq/test/store-clone/{id}', [PreviousYearTestController::class , 'storeClone'])
            ->name('pyq_clone_test');
        Route::get('/qb/clone-qb-test/{id}', [QuestionBankController::class , 'testClone'])
            ->name('clone-qb-test');
        Route::post('/qb/test/store-clone/{id}', [QuestionBankController::class , 'storeClone'])
            ->name('qb_clone_test');



        /** Start of Previous Year Questions  */

        //Previous-Year Category
        Route::get('/previous-year-management/category', [PreviousYearController::class , 'index'])
            ->name('previous_year');
        Route::get('/previous-year-management/category/create', [PreviousYearController::class , 'createPrevious'])
            ->name('create_previous');
        Route::get('/previous-year-management/category/edit/{id}', [PreviousYearController::class , 'previousEdit'])
            ->name('edit_previous');
        Route::get('/previous-year-management/category/show/{id}', [PreviousYearController::class , 'previousShow'])
            ->name('show_previous');
        Route::post('/previous-year-management/category/store', [PreviousYearController::class , 'previousStore'])
            ->name('store_previous');
        Route::post('/previous-year-management/category/update/{id}', [PreviousYearController::class , 'previousUpdate'])
            ->name('update_previous');
        Route::post('/previous-year-management/category/destroy/{id}', [PreviousYearController::class , 'previousDestroy'])
            ->name('destroy_previous_subject');

        //Previous Year Sub Category
        Route::get('/previous-year-questions/sub-categories', [PreviousYearController::class , 'categories'])
         ->name('previous_year_categories');
        Route::get('/previous-year-questions/sub-categories/create', [PreviousYearController::class , 'createCategories'])
            ->name('create_previous_year_categories');
        Route::get('/previous-year-questions/sub-categories/edit/{id}', [PreviousYearController::class , 'categoriesEdit'])
            ->name('edit_previous_year_categories');
        Route::post('/previous-year-questions/sub-categories/store', [PreviousYearController::class , 'categoriesStore'])
            ->name('store_previous_year_categories');
        Route::post('/previous-year-questions/sub-categories/update/{id}', [PreviousYearController::class , 'categoriesUpdate'])
            ->name('update_previous_year_categories');
        Route::post('/previous-year-questions/sub-categories/destroy/{id}', [PreviousYearController::class , 'categoriesDestroy'])
            ->name('destroy_previous_year_categories');


         //Previous-Year Test
        Route::get('/previous-year-management/test', [PreviousYearTestController::class , 'index'])
            ->name('previous_year_test');
        Route::get('/previous-year-management/test/create', [PreviousYearTestController::class , 'createPreviousTest'])
            ->name('create_previous_test');
        Route::get('/previous-year-management/test/edit/{id}', [PreviousYearTestController::class , 'previousTestEdit'])
            ->name('edit_previous_test');
        Route::get('/previous-year-management/test/show/{id}', [PreviousYearTestController::class , 'previousTestShow'])
            ->name('show_previous_test');
        Route::post('/previous-year-management/test/store', [PreviousYearTestController::class , 'previousTestStore'])
            ->name('store_previous_test');
        Route::post('/previous-year-management/test/update/{id}', [PreviousYearTestController::class , 'previousTestUpdate'])
            ->name('update_previous_test');
        Route::post('/previous-year-management/test/destroy/{id}', [PreviousYearTestController::class , 'previousDestroy'])
            ->name('destroy_previous');
        Route::get('/previous-year-management/test/edit/{id}/filter', [PreviousYearTestController::class , 'previousSearch'])
            ->name('search_previous_test');
        Route::post('/previous-year-management/test/add-question/{id}', [PreviousYearTestController::class , 'previousAddTestUpdate'])
            ->name('update_previous_add_test');
        Route::get('/previous-year-management/test/destroy-question/{id}', [PreviousYearTestController::class , 'previousAddTestDestroy'])
            ->name('destroy_previous_test');
            Route::post('/previous-subcategory', [PreviousYearTestController::class , 'subCat'])
            ->name('previous-subcategory');
            Route::post('/previous-year-question/test/filter', [PreviousYearTestController::class , 'filter'])
            ->name('pyq_filter');

        /** End of Previous Year Questions  */


        /** Start of Question Bank Management  */

         //Question Bank Category
        Route::get('/question-bank-management/category', [QuestionBankController::class , 'subject'])
            ->name('question_bank_subject');
        Route::get('/question-bank-management/category/create', [QuestionBankController::class , 'createSubject'])
            ->name('create_question_bank_subject');
        Route::get('/question-bank-management/category/edit/{id}', [QuestionBankController::class , 'subjectEdit'])
            ->name('edit_question_bank_subject');
        Route::post('/question-bank-management/category/store', [QuestionBankController::class , 'subjectStore'])
            ->name('store_question_bank_subject');
        Route::post('/question-bank-management/category/update/{id}', [QuestionBankController::class , 'subjectUpdate'])
            ->name('update_question_bank_subject');
        Route::post('/question-bank-management/category/destroy/{id}', [QuestionBankController::class , 'subjectDestroy'])
            ->name('destroy_question_bank_subject');


        //Question Bank Sub Category
        Route::get('/question-bank-management/sub-category', [QuestionBankController::class , 'categories'])
            ->name('question_bank_categories');
        Route::get('/question-bank-management/sub-category/create', [QuestionBankController::class , 'createCategories'])
            ->name('create_question_bank_categories');
        Route::get('/question-bank-management/sub-category/edit/{id}', [QuestionBankController::class , 'categoriesEdit'])
            ->name('edit_question_bank_categories');
        Route::post('/question-bank-management/sub-category/store', [QuestionBankController::class , 'categoriesStore'])
            ->name('store_question_bank_categories');
        Route::post('/question-bank-management/sub-category/update/{id}', [QuestionBankController::class , 'categoriesUpdate'])
            ->name('update_question_bank_categories');
        Route::post('/question-bank-management/sub-category/destroy/{id}', [QuestionBankController::class , 'categoriesDestroy'])
            ->name('destroy_question_bank_categories');


        //Question-Bank-questions
        Route::get('/question-bank-management/test', [QuestionBankController::class , 'question'])
            ->name('question_bank_question');
        Route::get('/question-bank-management/test/create', [QuestionBankController::class , 'createQuestion'])
            ->name('create_question_bank_question');
        Route::post('/subcat', [QuestionBankController::class , 'subCat'])
            ->name('subcat');
        Route::get('/question-bank-management/test/edit/{id}', [QuestionBankController::class , 'questionEdit'])
            ->name('edit_question_bank_question');
        Route::post('/question-bank-management/test/store', [QuestionBankController::class , 'questionStore'])
            ->name('store_question_bank_question');
        Route::get('/question-bank-management/test/show/{id}', [QuestionBankController::class , 'questionBankShow'])
            ->name('show_question_bank');
        Route::post('/question-bank-management/update-bank/{id}', [QuestionBankController::class , 'bankUpdate'])
            ->name('update_question_bank');
        Route::post('/question-bank-management/update-question/{id}', [QuestionBankController::class , 'questionUpdate'])
            ->name('update_question_bank_question');
        Route::get('/question-bank-management/test/destroy-bank/{id}', [QuestionBankController::class , 'bankDestroy'])
            ->name('destroy_question_bank');
        Route::post('/question-bank-management/destroy-question/{id}', [QuestionBankController::class , 'questionDestroy'])
            ->name('destroy_question_bank_question');
        Route::get('/question-bank-management/edit-question/{id}/filter', [QuestionBankController::class , 'search'])
            ->name('search_question_bank_test');
        Route::post('/question-bank-management/test/filter', [QuestionBankController::class , 'filter'])
            ->name('qb_filter');


        /** End of Question Bank Management  */


        /** Start of Daily Quiz */

        //Daily Quiz

        Route::get('/daily-quiz/test', [DailyQuizController::class , 'dailyQuiz'])
            ->name('daily_quiz');
        Route::get('/daily-quiz/create-quiz', [DailyQuizController::class , 'createQuiz'])
            ->name('create_daily_quiz');
        Route::post('/daily-quiz/store-quiz-date', [DailyQuizController::class , 'storeQuizDate'])
            ->name('store_quiz_date');
        Route::get('/daily-quiz/edit-date/{id}', [DailyQuizController::class , 'editDate'])
            ->name('edit_date');
            Route::post('/daily-quiz/update-date/{id}', [DailyQuizController::class , 'dateUpdate'])
            ->name('update_date');
            Route::post('/daily-quiz/delete-date/{id}', [DailyQuizController::class , 'deletedate'])
            ->name('update_date');
        Route::post('/daily-quiz/store-daily-quiz', [DailyQuizController::class , 'storeQuiz'])
            ->name('store_daily_quiz');
        Route::get('/daily-quiz/edit-quiz/{id}', [DailyQuizController::class , 'editQuiz'])
            ->name('edit_daily_quiz');
        Route::get('/daily-quiz/edit-quiz/{id}/filter', [DailyQuizController::class , 'search'])
            ->name('search_daily_quiz');
        Route::post('/daily-quiz/update-quiz/{id}', [DailyQuizController::class , 'updateQuiz'])
            ->name('update_daily_quiz');
        Route::post('/daily-quiz/update-test-quiz/{id}', [DailyQuizController::class , 'updateTestQuiz'])
            ->name('update_daily_test_quiz');
        Route::post('/daily-quiz/delete-test-quiz/{id}', [DailyQuizController::class , 'deleteTestQuiz'])
            ->name('delete_daily_test_quiz');
        Route::get('/daily-quiz/delete-quiz/{id}', [DailyQuizController::class , 'deleteQuiz'])
            ->name('delete_daily_quiz');
            Route::post('/daily-quiz/change-status', [DailyQuizController::class , 'orderchange'])
            ->name('quiz-order-change');


        /** End of Daily Quiz */



        /**Start of Helper Uploader*/

        /**Image Uploader Helper */
        Route::post('/fileUploadEditor', [HelperController::class , 'fileUploadEditor'])
            ->name('fileUploadEditor');

        /**Media Manager */

        Route::post('/file-upload-drop-box-editor', [HelperController::class , 'fileUploadDropBoxEditor'])
            ->name('fileUploadDropBoxEditor');
        Route::get('/get-media-gallery', [HelperController::class , 'getMediaGallery'])
            ->name('getMediaGallery');

       /** End of Helper Uploader*/


        /**Start of Reports*/

        //User Reports
        Route::get('/user-reports', [UserReportController::class , 'index'])
        ->name('user-reports');
        Route::get('/user-reports/show-user/{id}', [UserReportController::class , 'userShow'])
        ->name('show-user');

        //Exam Reports
        Route::get('/exam-reports', [ExamReportController::class , 'index'])
        ->name('exam-reports');
        Route::get('/exam-reports/show-report/{id}', [ExamReportController::class , 'examReportShow'])
        ->name('show-course-report');

        //Subscription Reports
        Route::get('/subscription-reports', [SubcsriptionReportController::class , 'index'])
        ->name('subscription-reports');

        /**End of Reports*/

        /**Start of Settings*/

        //General Setting
        Route::get('/setting/general',[AdminController::class,'generalSetting'])->name('setting.general');
        Route::post('/setting/general/update',[AdminController::class,'generalSettingUpdate'])->name('setting.generalUpdate');

        //Theme Setting
        Route::get('/setting/theme',[AdminController::class,'updateAdminTheme'])->name('updateAdminTheme');
        /**End of Settings*/


        /**Start of Testimonial*/
        Route::get('/testimonial/create',[TestimonialController::class,'create'])->name('testimonial.create');
        Route::get('/testimonial/index',[TestimonialController::class,'index'])->name('testimonial.index');
        Route::get('/testimonial/edit/{id}',[TestimonialController::class,'edit'])->name('testimonial.edit');
        Route::get('/testimonial/delete/{id}',[TestimonialController::class,'delete'])->name('testimonial.delete');
        Route::post('/testimonial/store',[TestimonialController::class,'store'])->name('testimonial.store');
        Route::patch('/testimonial/update/{id}',[TestimonialController::class,'update'])->name('testimonial.update');
        /**Start of Testimonial*/

        /**Start of Pages*/
        Route::get('/delete-page/{id}',[PagesController::class,'destroy'])->name('deletePage');
        Route::resource('page',PagesController::class);
        /**Start of Pages*/

        /**Start of Landing Pages*/
        Route::get('/delete-landing-page/{id}',[LandingPagesController::class,'destroy'])->name('deleteLandingPage');
        Route::resource('landing-page',LandingPagesController::class);
        /**Start of Landing Pages*/

        /**Start of FAQS*/
        Route::post('/faq/update',[FaqController::class,'update'])->name('faq.update');
        Route::get('faq',[FaqController::class,'index'])->name('faq.index');
        /**Start of FAQS*/

    });

});
