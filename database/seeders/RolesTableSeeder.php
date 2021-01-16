<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // creating 2 roles in our role table: Admin, Employee
        DB::table('roles')->insert([
            'title' => 'Admin',

        ]);

        DB::table('roles')->insert([
            'title' => 'Employee',

        ]);

        // giving user with id 1(Billy) the role of id 1(Admin)
        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id'=> 1

        ]);

        // giving user with id 2(Cindy) the role of id 2(Employee)
        // data is then added to role_user table
        DB::table('role_user')->insert([
            'role_id' => 2,
            'user_id'=> 2

        ]);

    }
}
