<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('general_settings')->insert([
            'site_title' => 'Billys Burgers',
            'logo_image_url' => '/img/clipart-restaurant-restaurant-logo-5.png',
            'address_1' => '121 W Wacker Dr',
            'address_2' => 'suite 2050',
            'city' => 'Chicago',
            'state' => 'IL',
            'zip_code' => '60601',
            'phone_number' => '347-231-4545',
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
    }
}
