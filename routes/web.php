<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('/internal', 'HomeController@internal');
Route::get('/internal-delete', 'HomeController@delete');
Route::get('/type/{type}/category', 'HomeController@getCategory');
Route::get('/category/{category}/symptoms', 'HomeController@getSymptoms');
Route::get('/symptoms/problems', 'HomeController@getProblems');
Route::get('/problems/{problem}/solution', 'HomeController@getSolutions');
Route::get('/create-knowledge', 'HomeController@create');
Route::get('/modify-knowledge', 'HomeController@modify');
Route::get('/delete/problem/{id}', 'HomeController@deleteProblem');
Route::get('/delete/symptom/{id}', 'HomeController@deleteSymptom');
Route::get('/delete/solution/{id}', 'HomeController@deleteSolution');
Route::get('/delete/category/{id}', 'HomeController@deleteCategory');
