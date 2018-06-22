<?php

use Illuminate\Database\Seeder;

class symptomsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	for($i=0;$i<10;$i++){
	        DB::table('symptoms')->insert([
	            'category_id' => rand(1,10),
	            'title' => str_random(10),
	        ]);
	    }
    }
}
