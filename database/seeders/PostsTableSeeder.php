<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = array(
        	[
	            'title' => 'Aversions\' First Post',
                'content' => 'I am your worst nightmare! Talk about going nowhere fast. Whats a knock-out like you doing in a computer-generated gin joint like this? I will obey your orders. I will serve this ship as First Officer. And in an attack against the Enterprise, I will die with this crew. But I will not break my oath of loyalty to Starfleet. For an android with no feelings, he sure managed to evoke them in others. Travel time to the nearest starbase? Well, thats certainly good to know. I recommend you dont fire until youre within 40,000 kilometers. Then maybe you should consider this: if anything happens to them, Starfleet is going to want a full investigation. Now, how the hell do we defeat an enemy that knows us better than we know ourselves? Im afraid I still dont understand, sir.',
	            'category' => null,
	            'slug' => 'aversions-first-post',
	            'published' => true,
                'user_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        ],
        );
        DB::table('posts')->insert($posts);
    }
}