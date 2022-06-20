<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Batch;
use App\Models\Admin\CourseType;
use App\Models\Admin\DailyQuiz;
use App\Models\Admin\PreviousYearSubject;
use App\Models\Admin\QuestionBankCategory;
use App\Models\Admin\QuestionBankSubject;
use App\Models\Admin\Series;
use App\Models\Admin\Test;
use Illuminate\Http\Request;

class ExamReportController extends Controller
{
    public function index()
    {
        $course_lists = CourseType::select('id','name')->get();
        return view('admin.report.exam-report.index')->with(compact('course_lists'));
    }


    public function examReportShow($id)
    {
        // For IAS view
        if ($id == 1){
          $batches = Batch::with('series')->active()->get();
          return view('admin.report.exam-report.show-ias')->with(compact('batches'));
        }

          // For Question Bank view
          if ($id == 2)
          {
            $categories = QuestionBankSubject::active()->get();

            return view('admin.report.exam-report.show-question-bank')->with(compact('categories'));
          }

       // For Question Bank view
       if ($id == 3)
       {
         $categories = PreviousYearSubject::active()->get();
         return view('admin.report.exam-report.show-previous-year-question')->with(compact('categories'));
       }

          if ($id == 4)
          {
         return   $categories = DailyQuiz::active()->get();
            return view('admin.report.exam-report.show-daily-quiz')->with(compact('categories'));
          }


    }

}
