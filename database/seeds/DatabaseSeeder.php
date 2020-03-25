<?php

use Illuminate\Database\Seeder;

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
    }
}
