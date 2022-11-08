<?php

namespace Database\Seeders;

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
        $events = array(
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
            [
                'name' => 'Aversions, The Rubber Bullys, Grandpas Medicine at SMF',
                'venue_id' => 4,
                'event_url' => 'https://www.facebook.com/events/1383003345198192/',
                'ticket_url' => null,
                'date' => Carbon::parse('2019-10-19'),
                'start_time' => '20:30:00',
                'end_time' => '01:00:00',
                'ticket_price' => 10.00,
                'event_poster' => 'sew_machine_poster_oct_19.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Aversions at Logan\'s',
                'venue_id' => 2,
                'event_url' => null,
                'ticket_url' => null,
                'date' => Carbon::parse('2019-10-13'),
                'start_time' => '20:30:00',
                'end_time' => '01:00:00',
                'ticket_price' => 10.00,
                'event_poster' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Aversions at Dicken\'s',
                'venue_id' => 3,
                'event_url' => null,
                'ticket_url' => null,
                'date' => Carbon::parse('2019-10-18'),
                'start_time' => '21:00:00',
                'end_time' => '00:00:00',
                'ticket_price' => 15.00,
                'event_poster' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Aversions in the Future',
                'venue_id' => 1,
                'event_url' => null,
                'ticket_url' => null,
                'date' => Carbon::parse('2021-10-20'),
                'start_time' => '21:00:00',
                'end_time' => '00:00:00',
                'ticket_price' => 15.00,
                'event_poster' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );
        DB::table('events')->insert($events);
    }
}