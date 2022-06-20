<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('admins')->delete();

        \DB::table('admins')->insert(array (
            0 =>
            array (
                'id' => 4,
                'name' => 'Leader IAS Academy',
                'type' => 'SuperAdmin',
                'mobile' => '+916385752831',
                'address' => NULL,
                'city' => 3659,
                'state' => 35,
                'country' => 101,
                'email' => 'karthickeyank214@gmail.com',
                'email_verified_at' => NULL,
                'password' => bcrypt('LeadIASacd@20#20$'),
                'image' => 'images/admin_images/admin_photos/admin.png',
                'status' => 1,
                'theme' => 1,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));


    }
}
