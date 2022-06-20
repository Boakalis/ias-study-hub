<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FaqCategory;

class FaqCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            ['name' => 'General'],
            [ 'name' => 'Accounts'],
            [ 'name' => 'Sales' ],
            [ 'name' => 'Support'],
            [ 'name' => 'License'],
            [ 'name' => 'Refund'],

        ];
        FaqCategory::insert($datas);
    }
}
