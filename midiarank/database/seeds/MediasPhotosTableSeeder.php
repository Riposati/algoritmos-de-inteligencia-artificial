<?php

use Illuminate\Database\Seeder;

class MediasPhotosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('medias_photos')->delete();
        
        \DB::table('medias_photos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'media_id' => 1,
                'photo' => 'the-last-of-us-2.jpg',
                'created_at' => '2020-06-30 14:14:42',
                'updated_at' => '2020-06-30 14:14:42',
            ),
        ));
        
        
    }
}