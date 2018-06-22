<?php

namespace App\Providers;

use App\Model\Problems;
use App\Model\Symptoms;

class ProblemsProvider {
	public static function get($id) {
		$var = Problems::find($id);
		return $var;
	}
	public static function create($title) {
		$var = new Problems;
		$var->title = $title;
		if($var->save()) {
			return $var->id;
		}
		return false;
	}
	public static function getSolutions($id) {
		$var = Problems::find($id);
		return $var->solutions;
	}
	public static function linkSymptoms($id, $symptoms) {
		$var = Problems::find($id);
		foreach($symptoms as $key => $value) {
			$var->symptoms()->attach($value);
		}
		return true;
	}
	public static function delete($id) {
		$var = Problems::find($id);
		$var->symptoms()->detach();
		return $var->delete();
	}
}
