<?php

use Illuminate\Database\Seeder;

class categorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	for($i=0;$i<10;$i++){
	        DB::table('category')->insert([
	            'type' => rand(1,2),
	            'title' => str_random(10),
	        ]);
	    }
    }
}
