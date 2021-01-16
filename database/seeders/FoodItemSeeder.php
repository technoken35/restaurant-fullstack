<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;


class FoodItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('food_items')->insert([
            'title' => 'Texas Burger',
            'description' => 'Charbroiled Black Angus Beef Patty, Two Slices of American Cheese, and the freshest ingredients around. ',
            'image_url' => '/img/342-3422633_pork-entrees-steak-pork-png.png',
            'price'=> 9.99,
            'category_id'=> 2,
            'updated_at'=> Carbon::now(),
            'created_at'=> Carbon::now(),
        ]);

        DB::table('food_items')->insert([
            'title' => 'BBQ Burger',
            'description' => 'Charbroiled Black Angus Beef Patty, Two Slices of American Cheese, and the freshest ingredients around. ',
            'image_url' => '/img/342-3422633_pork-entrees-steak-pork-png.png',
            'price'=> 9.99,
            'category_id'=> 2,
            'updated_at'=> Carbon::now(),
            'created_at'=> Carbon::now(),
        ]);

        DB::table('food_items')->insert([
            'title' => 'Billy Burger',
            'description' => 'Charbroiled Black Angus Beef Patty, Two Slices of American Cheese, and the freshest ingredients around. ',
            'image_url' => '/img/342-3422633_pork-entrees-steak-pork-png.png',
            'price'=> 9.99,
            'category_id'=> 2,
            'updated_at'=> Carbon::now(),
            'created_at'=> Carbon::now(),
        ]);
    }
}
