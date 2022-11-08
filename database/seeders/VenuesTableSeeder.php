<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class VenuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$venues = array(
			[
	            'name' => 'Red Gate Arts Society',
	            'email' => 'redgatebooking@gmail.com',
	            'city' => 'Vancouver',
	            'country' => 'Canada',
	            'state' => 'British Columbia',
	            'address' => '1965 Main Street',
	            'postal_code' => 'V5T 3C1',
	            'website_url' => 'http://redgate.at.org',
	           	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'Logan\'s Tavern of the Damned',
	            'email' => 'booking@loganspub.com',
	            'city' => 'Victoria',
	            'country' => 'Canada',
	            'address' => '1821 Cook Street',
	            'state' => 'British Columbia',
	            'postal_code' => 'V8T 3P5',
	            'website_url' => 'http://www.loganspub.com',
	           	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'Dicken\'s Public House',
	            'email' => 'dickensbookings@gmail.com',
	            'city' => 'Calgary',
	            'country' => 'Canada',
	            'address' => '1000 9 Ave SW',
	            'state' => 'Alberta',
	            'postal_code' => 'T2P 2Y6',
	            'website_url' => 'http://www.dickenspub.ca',
	            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        ],
	        [
	            'name' => 'Sewing Machine Factory',
	            'email' => 'thesewingmachinefactory@gmail.com',
	            'city' => 'Edmonton',
	            'country' => 'Canada',
	            'address' => '9562 82 Ave NW',
	            'state' => 'Alberta',
	            'postal_code' => 'T6C 0Z8',
	            'website_url' => 'https://www.facebook.com/TheSewingMachineFactory/',
	            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        ],
    	);
        DB::table('venues')->insert($venues);
    }
}