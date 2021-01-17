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
        // \App\Models\User::factory(10)->create();
        // this class creates dummy users
        $this->call(UsersTableSeeder::class);
        // this class creates 'dummy' roles
        $this->call(RolesTableSeeder::class);
        // Make sure Food Category comes first
        $this->call(FoodCategorySeeder::class);
        $this->call(FoodItemSeeder::class);
        $this->call(MemberSeeder::class);

    }
}
