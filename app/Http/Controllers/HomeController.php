<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Symptoms;
use App\Model\Problems;
use App\Model\Solutions;
use App\Providers\CategoryProvider;
use App\Providers\SymptomsProvider;
use App\Providers\ProblemsProvider;
use App\Providers\SolutionsProvider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
    {
        return view('index');
    }
    public function internal()
    {
        return view('internal');
    }
    public function delete()
    {
        return view('deletepage');
    }
    public function create(Request $request) {
    	// Define function varibales
    	if(empty($request->solutions) || empty($request->problem) || (empty($request->category) && empty($request->new_category)))
    	{
    		return false;
    	}
        else
        {
            $category_id = false;
            $problem_id = false;
            // Check if new or existing category
            if(isset($request->new_category))
            {
                // Send to category
                $category_id = CategoryProvider::create($request->new_category, $request->type);
            }
            else 
            {   
                $category_id = $request->category;
            }
            // Send to problem and return problem id
            $problem_id = ProblemsProvider::create($request->problem);
            if(!$problem_id) 
            {
                return "Could not add problem";
            }
            // Send to solution
            if(!SolutionsProvider::create($request->solutions, $problem_id)) 
            {
                return "Could not add solutions";
            }
            // check if existing symptoms

            if(isset($request->new_symptoms) && !empty($request->new_symptoms))
            {
                // Send to symptoms
                if(!SymptomsProvider::create($request->new_symptoms, $category_id, $problem_id))
                {
                    return "Could not add symptoms";
                }
            }
            else 
            {
                // Send to problems to append
                if(!ProblemsProvider::linkSymptoms($problem_id,$request->symptoms))
                {
                    return "Could not add symptoms to problems";
                }
            }
            return json_encode([
              'status'  => 'success',
              'message' => 'Knowledge created successfully'
            ]);
        }
    }
    public function modify(Request $request) {

    }
    public function getCategory($type) {
    	$category = CategoryProvider::getByType($type);
    	if($category)
    	{
	    	return json_encode([
	            'status'	=> 	'success',
	            'data' 		=>	$category->toArray(),
	            'message'	=>	'Category Found'
	          ]);
	    }
	    else {
	    	return json_encode([
	            'status'	=>	'error',
	            'message'	=>	'No category found for the section'
	          ]);
	    }
    }
    public function getSymptoms($category) {
    	$symptoms = SymptomsProvider::getByCategory($category);
    	if($symptoms)
    	{
	    	return json_encode([
	            'status'	=> 	'success',
	            'data' 		=>	$symptoms->toArray(),
	            'message'	=>	'Possible symptoms found'
	          ]);
	    }
	    else {
	    	return json_encode([
	            'status'	=>	'error',
	            'message'	=>	'No possible symptom found'
	          ]);
	    }
    }
    public function getProblems(Request $request) {
    	$problem = SymptomsProvider::getProblems($request->symptoms);
    	if($problem)
    	{
	    	return json_encode([
	            'status'	=> 	'success',
	            'data' 		=>	$problem->toArray(),
	            'message'	=>	'Possible problem found'
	          ]);
	    }
	    else {
	    	return json_encode([
	            'status'	=>	'error',
	            'message'	=>	'No possible problem found'
	          ]);
	    }
    }
    public function getSolutions($problem) {
    	$solution = ProblemsProvider::getSolutions($problem);
    	if($solution)
    	{
	    	return json_encode([
	            'status'	=> 	'success',
	            'data' 		=>	$solution->toArray(),
	            'message'	=>	'Possible solution found'
	          ]);
	    }
	    else {
	    	return json_encode([
	            'status'	=>	'error',
	            'message'	=>	'No possible solution found'
	          ]);
	    }
    }
    public function deleteProblem($id) {
        $delete = ProblemsProvider::delete($id);
        if($delete)
        {
            return json_encode([
                'status'    =>  'success',
                'message'   =>  'Problem deleted'
              ]);
        }
        else {
            return json_encode([
                'status'    =>  'error',
                'message'   =>  'Problem could not be deleted'
              ]);
        }
    }
    public function deleteSymptom($id) {
        $delete = SymptomsProvider::delete($id);
        if($delete)
        {
            return json_encode([
                'status'    =>  'success',
                'message'   =>  'Symptom deleted'
              ]);
        }
        else {
            return json_encode([
                'status'    =>  'error',
                'message'   =>  'Symptom could not be deleted'
              ]);
        }
    }
    public function deleteSolution($id) {
        $delete = SolutionsProvider::delete($id);
        if($delete)
        {
            return json_encode([
                'status'    =>  'success',
                'message'   =>  'Solution deleted'
              ]);
        }
        else {
            return json_encode([
                'status'    =>  'error',
                'message'   =>  'Solution could not be deleted'
              ]);
        }
    }
    public function deleteCategory($id) {
        $delete = CategoryProvider::delete($id);
        if($delete)
        {
            return json_encode([
                'status'    =>  'success',
                'message'   =>  'Category deleted'
              ]);
        }
        else {
            return json_encode([
                'status'    =>  'error',
                'message'   =>  'Category could not be deleted'
              ]);
        }
    }
}
