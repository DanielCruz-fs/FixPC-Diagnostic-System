<?php

use Illuminate\Database\Seeder;

class problemsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	for($i=0;$i<10;$i++){
	        DB::table('problems')->insert([
	            'title' => str_random(10),
	        ]);
	    }
    }
}
