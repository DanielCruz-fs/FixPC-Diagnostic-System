<?php 

namespace App\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Category extends Eloquent{

	protected $table = 'category';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'type'
    ];
    public $timestamps = true;

    public function symptoms() {
        return $this->hasMany('App\Model\Symptoms');
    }
}
