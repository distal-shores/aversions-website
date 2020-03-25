<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users = array(
			[
	            'name' => 'sammyc',
	            'email' => 'samcoll@gmail.com',
	            'password' => bcrypt('aversions2018'),
	        ],
    	);
        DB::table('users')->insert($users);
    }
}