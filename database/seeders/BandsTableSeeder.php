<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class BandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$bands = array(
        	[
	            'name' => 'Aversions',
	            'email' => 'band@aversionsband.com',
	            'city' => 'Vancouver',
	            'country' => 'Canada',
	            'website_url' => 'http://aversionsband.com',
	            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        ],
        	[
	            'name' => 'Apathy Spells',
	            'email' => null,
	            'city' => 'Vancouver',
	            'country' => 'Canada',
	            'website_url' => '',
	           	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'Brutal Poodle',
	            'email' => '',
	            'city' => 'Vancouver',
	            'country' => 'Canada',
	            'website_url' => null,
	           	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'Electric Blanket',
	            'email' => 'kevinfrankmusic@gmail.com',
	            'city' => 'Victoria',
	            'country' => 'Canada',
	            'website_url' => 'https://theelectricblanket.bandcamp.com',
	           	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        ],
    	);
        DB::table('bands')->insert($bands);
    }
}
