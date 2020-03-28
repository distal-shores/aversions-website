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
            [
                'name' => 'joer',
                'email' => 'joeross@live.com',
                'password' => bcrypt('aversions2018'),
            ],
            [
                'name' => 'cdevlin',
                'email' => 'chad.d2117@gmail.com',
                'password' => bcrypt('aversions2018'),
            ],
            [
                'name' => 'rmunro',
                'email' => 'rory.john.munro@gmail.com',
                'password' => bcrypt('aversions2018'),
            ],
    	);
        DB::table('users')->insert($users);
    }
}