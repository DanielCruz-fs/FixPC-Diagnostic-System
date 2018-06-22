<?php

use Illuminate\Database\Seeder;

class problemsymptomsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	for($i=0;$i<10;$i++){
	        DB::table('problem_symptom')->insert([
	            'problem_id' => rand(1,10),
	            'symptom_id' => rand(1,10),
	        ]);
	    }
    }
}
