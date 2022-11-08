<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $songs = array(
            [
                'name' => 'Famous Last Lines',
                'slug' => 'famous-last-lines',
                'release_date' => '2021-07-02',
                'description' => 'A song about the weirdness of owning things',
                'is_single' => true,
                'epk_published' => false,
                'cover_art' => 'Aversions_FLL.png',
                'bandcamp_slug' => 'famous-last-lines',
                'soundcloud_param' => '1063169572%3Fsecret_token%3Ds-eYwHiO8xVMc',
                'soundcloud_slug' => 'famous-last-lines/s-eYwHiO8xVMc',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );
        DB::table('songs')->insert($songs);
    }
}