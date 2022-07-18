<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mroles')->insert([
            [
                'role_name' => 'super admin',
                'role_assign' => 'mbarang,mcustomer,mrole,torder,muser',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
			[
                'role_name' => 'admin',
                'role_assign' => 'mbarang,torder',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
			
        ]);
		DB::table('musers')->insert([
            [
                'name' => 'dana',
				'username' => 'dana88',
				'email' => 'dana88@grtech.com.my',
				'phone' => '0811919191',
				'address' => 'jakarta selatan',
                'password' => Hash::make('dana88'),
				'm_role' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
			[
               'name' => 'dina',
				'username' => 'dina88',
				'email' => 'dina88@grtech.com.my',
				'phone' => '0811919191',
				'address' => 'jakarta utara',
                'password' => Hash::make('dina88'),
				'm_role' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
