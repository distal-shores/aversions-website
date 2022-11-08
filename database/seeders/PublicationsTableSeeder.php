<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class PublicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pubs = array(
            [
                'name' => 'IDIOTEQ',
                'email' => 'www.idioteq.com@gmail.com',
                'contact_name' => 'Karol Kaminski',
                'url' => 'https://idioteq.com',
                'print_only' => 0,
                'city' => null,
                'country' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Rekt Chords Magazine',
                'email' => 'info@rektchords.com',
                'contact_name' => 'Slone Fox',
                'url' => 'https://www.rektchords.com/',
                'print_only' => 0,
                'city' => 'Vancouver',
                'country' => 'Canada',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Citrus Magazine',
                'email' => 'citrusmagazineeverybody@gmail.com',
                'contact_name' => 'Johnny Kosmos',
                'url' => 'https://www.citrusmagazine.org/',
                'print_only' => 0,
                'city' => null,
                'country' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Bucketlist Music Reviews',
                'email' => 'info@bucketlistmusicreviews.com',
                'contact_name' => 'Shawn Thicke',
                'url' => 'https://www.bucketlistmusicreviews.com/',
                'print_only' => 0,
                'city' => null,
                'country' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );
        DB::table('publications')->insert($pubs);
    }
}

