<?php

use Illuminate\Database\Seeder;

class solutionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	for($i=0;$i<10;$i++){
	        DB::table('solutions')->insert([
                'title' => str_random(10),
	            'problems_id' => rand(1,10),
	        ]);
	    }
    }
}
