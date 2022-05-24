<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
       
        // DB::table('users')->insert([
        //     'name' => "Gustavo Riposati",
        //     'email' => "guriposa@gmail.com",
        //     'email_confirmation' => "guriposa@gmail.com",
        //     'password' => Hash::make('12345'),
        //     'password_confirmation' => Hash::make('12345'),
        // ]);

        $this->call(UserSeeder::class);
        $this->call(MediasTableSeeder::class);
        $this->call(MediaLikesTableSeeder::class);        
        $this->call(MediasPhotosTableSeeder::class);
    }
}
