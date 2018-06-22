<?php

use Illuminate\Database\Seeder;

class problemsolutionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	for($i=0;$i<10;$i++){
	        DB::table('problem_solution')->insert([
	            'problem_id' => rand(1,5),
	            'solution_id' => rand(1,5),
	        ]);
	    }
    }
}
