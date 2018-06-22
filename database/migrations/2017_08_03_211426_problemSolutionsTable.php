<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProblemSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problem_solution', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('problem_id')->unsigned();
            $table->integer('solution_id')->unsigned();
            $table->foreign('problem_id')->references('id')->on('problems')->onDelete('cascade');
            $table->foreign('solution_id')->references('id')->on('solutions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problem_solution');
    }
}
