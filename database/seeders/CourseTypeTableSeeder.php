<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CourseTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('course_types')->delete();

        \DB::table('course_types')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'IAS',
                'created_at' => '2021-03-23 18:39:30',
                'updated_at' => '2021-03-23 18:39:30',

            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Question Bank',
                'created_at' => '2021-03-23 18:39:30',
                'updated_at' => '2021-03-23 18:39:30',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Previous Year Question',
                'created_at' => '2021-03-23 18:39:30',
                'updated_at' => '2021-03-23 18:39:30',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Daily Quiz',
                'created_at' => '2021-03-23 18:39:30',
                'updated_at' => '2021-03-23 18:39:30',
            ),
        ));


    }
}
