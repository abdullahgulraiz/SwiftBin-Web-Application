<?php

use Illuminate\Database\Seeder;

class ObservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //20 observations each for 8 bins
        for ($i = 1; $i <= 8; $i++) {
        	for ($j = 0; $j < 20; $j++) {
        		App\Observation::create(['bin_id' => $i, 'weight' => rand(0, 10000), 'infrared' => rand(0,1)]);
        	}
        }
    }
}
