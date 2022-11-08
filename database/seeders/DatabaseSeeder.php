<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BandEventTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BandsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(VenuesTableSeeder::class);
        $this->call(ClippingsTableSeeder::class);
        $this->call(PublicationsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(SongsTableSeeder::class);
    }
}
