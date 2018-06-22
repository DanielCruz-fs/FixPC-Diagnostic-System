<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(categorySeed::class);
        $this->call(problemsSeed::class);
        $this->call(solutionSeed::class);
        $this->call(symptomsSeed::class);
        $this->call(problemsolutionSeed::class);
        $this->call(problemsymptomsSeed::class);
    }
}
