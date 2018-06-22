<?php

namespace App\Providers;

use App\Model\Category;
use App\Providers\SymptomsProvider;

class CategoryProvider {
	public static function get($id) {
		return Category::find($id);
	}
	public static function getByType($type) {
		return Category::where("type",$type)->get();
	}
	public static function create($title,$type) {
		$cat = new Category;
		$cat->title = $title;
		$cat->type = $type;
		if($cat->save()) {
			return $cat->id;
		}
	}
	public static function delete($id){
		$category = Category::find($id);
		foreach ($category->symptoms as $symptoms) {
			SymptomsProvider::delete($symptoms->id);
		}
		return $category->delete();
	}
}