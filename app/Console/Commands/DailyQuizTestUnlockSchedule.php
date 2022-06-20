<?php

namespace App\Console\Commands;

use App\Models\Admin\DailyQuiz;
use Illuminate\Console\Command;

class DailyQuizTestUnlockSchedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dailyquiz:unlock';

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
       DailyQuiz::where('date',date('Y-m-d'))->update(['status' => 1]);
    }
}
