<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $table = 'stages';
	protected $fillable = ['name', 'description', 'position', 'url', 'course_id'];

	public function course(){
		return $this->belongsTo('App\Course');
	}

	public function items(){
    	return $this->hasMany('App\Item');
    }
}
