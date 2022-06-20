<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\QuestionExport;
use App\Imports\QuestionsImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class BulkController extends Controller
{
    public function importExportView()
    {
        return view('import');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new QuestionExport, 'question.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import(Request $request)
    {

        $validatedData = $request->validate(['file' => 'required|max:2048', 'subject_id' => 'required',

        ], ['file.required' => 'Please Upload File','file.size' => 'Please select below 2mb','subject_id.required' => 'Please Select Subject' ]);

        $data = ['subject_id' => request('subject_id') ];

        Excel::import(new QuestionsImport($data) , request()->file('file'));

        return back()->with(Session::flash('alert-success', 'Question Created Successfully'));
        ;
    }
}

