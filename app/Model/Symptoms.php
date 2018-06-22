<?php 

namespace App\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Symptoms extends Eloquent{

	protected $table = 'symptoms';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'title', 
    ];
    public $timestamps = true;

    public function problems() {
        return $this->belongsToMany('App\Model\Problems', 'problem_symptom', 'symptom_id', 'problem_id');
    }
}
