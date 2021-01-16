<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;




class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('food_categories')->insert([
            'title' => 'starters',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi omnis iste ab deleniti cupiditate architecto.',
            'image_url' => '/img/CHIPS.png',
            'updated_at'=> Carbon::now(),
            'created_at'=> Carbon::now(),

        ]);

        DB::table('food_categories')->insert([
            'title' => 'burgers',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi omnis iste ab deleniti cupiditate architecto.',
            'image_url' => '/img/hamburger-and-fries-png-4.png',
            'updated_at'=> Carbon::now(),
            'created_at'=> Carbon::now(),

        ]);

        DB::table('food_categories')->insert([
            'title' => 'entrees',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi omnis iste ab deleniti cupiditate architecto.',
            'image_url' => '/img/342-3422633_pork-entrees-steak-pork-png.png',
            'updated_at'=> Carbon::now(),
            'created_at'=> Carbon::now(),
        ]);

        DB::table('food_categories')->insert([
            'title' => 'sides',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi omnis iste ab deleniti cupiditate architecto.',
            'image_url' => '/img/Download-Salad-Transparent-PNG.png',
            'updated_at'=> Carbon::now(),
            'created_at'=> Carbon::now(),
        ]);

        DB::table('food_categories')->insert([
            'title' => 'deserts',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi omnis iste ab deleniti cupiditate architecto.',
            'image_url' => '/img/Download-Cupcake-PNG-Transparent-Image-420x190.png',
            'updated_at'=> Carbon::now(),
            'created_at'=> Carbon::now(),
        ]);

    }
}
