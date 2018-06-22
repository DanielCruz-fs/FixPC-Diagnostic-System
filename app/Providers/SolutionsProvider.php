<?php

namespace App\Providers;

use App\Model\Solutions;

class SolutionsProvider {
	public static function get($id) {
		$solution = Solutions::find($id);
		return $solutions;
	}
	public static function delete($id) {
		$solution = Solutions::find($id);
		return $solution->delete();
	}
	public static function create($title, $problems_id) {
		foreach($title as $key => $value) {
			$solution = new Solutions;
			$solution->title = $value;
			$solution->problems_id = $problems_id;
			if(!$solution->save()) {
				return false;
			}
		}
		return true;
	}
}