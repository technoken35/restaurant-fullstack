<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fname' => 'Billy',
            'lname' => 'Bob',
            'email' => 'billy@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'fname' => 'Cindy',
            'lname' => 'Johnson',
            'email' => 'cindy@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
