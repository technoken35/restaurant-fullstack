<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            'fname' => 'Bruce',
            'lname' => 'Wayne',
            'email' => 'bruce@gmail.com',
            'phone_number'=>'6083120995',
            'updated_at'=> Carbon::now(),
            'created_at'=> Carbon::now(),

        ]);

        DB::table('members')->insert([
            'fname' => 'Jennifer',
            'lname' => 'Johnson',
            'email' => 'jennifer@gmail.com',
            'phone_number'=>'7733120995',
            'updated_at'=> Carbon::now(),
            'created_at'=> Carbon::now(),
        ]);
    }
}
