<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BandEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$bands_events = array(
			[
				'band_id' => '1',
	        	'event_id' => '1',
			],
			[
				'band_id' => '2',
	        	'event_id' => '1',
			],
			[
				'band_id' => '3',
	        	'event_id' => '1',
			],
    	);
		DB::table('band_event')->insert($bands_events);
    }
}
