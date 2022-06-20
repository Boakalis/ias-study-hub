<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SettingGeneral;

class SettingGeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas =[
            'name' => 'IAS Study Hub',
            'title' => 'IAS Study Hub',
            'description' => 'IAS Study Hub',
            'email' => 'support@iasstudyhub.com',
            'address' => 'No: 104, AB Block, Anna Nagar, Chennai, Tamil Nadu – 600040',
            'phone_no' => '+91 8056 295 437',
            'footer_text' => 'Copyright @ IAS Study Hub',
            'landline' => '+91 8056 295 437',
            'website' => 'www.iasstudyhub.com',
            'logo' => '/images/logo.png',
            'favicon' => '/images/favicon.png',
            'facebook' => '',
            'twitter' => '',
            'linkedin' => '',
            'youtube' => '',
            'pinterest' => '',
            'whatsapp' => '+91 8056 295 437',
            'instagram' => '',
            'meta_title' => 'IAS Study Hub',
            'meta_description' => 'IAS Study Hub',
            'meta_keywords' => 'IAS Study Hub',
            'is_cookies_enabled' => 0,
            'cookies_message' => '<p>There are no cookies used on this site, but if there were this message could be customised to provide more details. Click the <strong>accept</strong> button below to see the optional callback in action... <a href="#privacy">More information</a></p>',
            'header_script' => '',
            'footer_script' => '',
    ];

    SettingGeneral::updateOrCreate(['id' => 1],$datas);

    }
}

