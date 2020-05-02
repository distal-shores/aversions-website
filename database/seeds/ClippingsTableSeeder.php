<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ClippingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clips = array(
            [
                'title' => 'Aversions Affinity',
                'publication_id' => 3,
                'band_id' => 1,
                'url' => 'https://www.citrusmagazine.org/new-blog/2020/4/2/aversion-affinity',
                'pullquote' => 'There’s something soothing about knowing someone feels the same shitty way you’re feeling, and Aversions get it.',
                'publish_date' => Carbon::parse('2020-04-02'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'title' => 'ALBUM REVIEW: AVERSIONS | BASE PORTRAIT',
                'publication_id' => 2,
                'band_id' => 1,
                'url' => 'https://www.rektchords.com/post/album-review-aversions-base-portrait',
                'pullquote' => 'The perfect amount of yell-y, spoken word-y and sing-y, the six track EP is the trail mix of music, minus any gross metaphorical raisins that you’d have to pick out.',
                'publish_date' => Carbon::parse('2020-03-27'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Aversions – Base Portrait EP',
                'publication_id' => 4,
                'band_id' => 1,
                'url' => 'https://www.bucketlistmusicreviews.com/aversions-base-portrait-ep/',
                'pullquote' => 'Aversions’ Base Portrait EP is a refreshing debut that showcases a band (and a deranged lead singer) who are already at the precipice of mastering the post-punk genre.',
                'publish_date' => Carbon::parse('2020-04-27'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );
        DB::table('clippings')->insert($clips);
    }
}