<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(AddressBooksTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(BatchesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(SeriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(TestsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CourseTypeTableSeeder::class);
        $this->call(PaymentTypeTableSeeder::class);
        $this->call(SettingGeneralSeeder::class);
        $this->call(FaqCategorySeeder::class);


    }
}
