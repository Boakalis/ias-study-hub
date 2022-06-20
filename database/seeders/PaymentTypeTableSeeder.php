<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('payment_types')->delete();

        \DB::table('payment_types')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Online',
                'created_at' => '2021-03-23 18:39:30',
                'updated_at' => '2021-03-23 18:39:30',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Cash',
                'created_at' => '2021-03-23 18:39:30',
                'updated_at' => '2021-03-23 18:39:30',
            ),

        ));

    }
}
