<?php

namespace App\Console\Commands;

use App\Models\Admin\AddQuizQuestion;
use App\Models\Admin\CourseType;
use App\Models\Admin\DailyQuiz;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DailyQuizTestCreateSchedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dailyquiz:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      $createTestID =  DailyQuiz::create
      ([
                'name' => date('F').'-'.date('d'),
                'duration' => 10,
                'date' => date('Y-m-d'),
                'time' => 18.00,
                'mark' => 10,
                'status' => 0 ,
                'slug' => 'default-slug',
      ])->id;

    //   $question_ids = Question::inRandomOrder()
    //   ->limit(10)
    //   ->get()->pluck('id');

    //   foreach ($question_ids as $key => $question_id) {
    //       AddQuizQuestion::create([
    //           'test_id' => $createTestID,
    //           'question_id' => $question_id,
    //       ]);
    //   }
    }
}
