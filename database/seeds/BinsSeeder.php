<?php

use Illuminate\Database\Seeder;

class BinsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*
        USER 2: 3 bins, USER 3: 5 bins
        */
        for ($i = 0; $i < 3; $i++) {
        	App\Bin::create(['user_id' => 2, 'mobile' => '+92316'.rand(0,9999999), 'location' => 'Location '.$i]);
        }
        for ($i = 3; $i < 8; $i++) {
        	App\Bin::create(['user_id' => 3, 'mobile' => '+92322'.rand(0,9999999), 'location' => 'Location '.$i]);
        }
    }
}
