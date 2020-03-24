<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert(
        	[
	            'name' => 'Aversions Vinyl EP Release Show',
                'venue_id' => 1,
	            'event_url' => 'https://www.facebook.com/events/2490016791251513',
	            'ticket_url' => null,
	            'date' => Carbon::parse('2020-03-06'),
	            'start_time' => '20:30:00',
	            'end_time' => '01:00:00',
	            'ticket_price' => 10.00,
                'event_poster' => 'red_gate_poster.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        ],
	    );
    }
}