<?php

use Illuminate\Database\Seeder;

class MediaLikesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('media_likes')->delete();
        
        \DB::table('media_likes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'like' => 1,
                'user_id' => 1,
                'media_id' => 1,
                'created_at' => '2020-06-30 03:35:29',
                'updated_at' => '2020-06-30 03:35:29',
            ),
        ));
        
        
    }
}