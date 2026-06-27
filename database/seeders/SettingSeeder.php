<?php

namespace Database\Seeders;
use Hash;
use App\Models\Setting;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $settings = [
            [
                'name' => 'Main Header Logo',
                'slug' => 'main-header-logo',
                'value' => ''
            ],
            [
                'name' => 'Contact Us Mobile Number',
                'slug' => 'contact-us-mobile-number',
                'value' => '1234567890'
            ]
        ];

        foreach ($settings as $key => $value) {
            $find = Setting::where('slug', $value['slug'])->first();

            // if((!empty($find)) && $find->slug == 'lead-hide-in-transporter-side-in-a-days') {
            //     $find->update($value);
            // }

            if (is_null($find)) {
                Setting::create($value);
            }
        }
    }
}
