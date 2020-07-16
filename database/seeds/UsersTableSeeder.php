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
	            'name' => 'samcoll',
                'display_name' => 'Sammy C',
	            'email' => 'samcoll@gmail.com',
	            'password' => bcrypt('aversions2018'),
	        ],
            [
                'name' => 'joeross',
                'display_name' => 'Joey Razor',
                'email' => 'joeross@live.com',
                'password' => bcrypt('aversions2018'),
            ],
            [
                'name' => 'chaddevlin',
                'display_name' => 'CD',
                'email' => 'chad.d2117@gmail.com',
                'password' => bcrypt('aversions2018'),
            ],
            [
                'name' => 'rorymunro',
                'display_name' => 'Rory',
                'email' => 'rory.john.munro@gmail.com',
                'password' => bcrypt('aversions2018'),
            ],
    	);
        DB::table('users')->insert($users);
    }
}