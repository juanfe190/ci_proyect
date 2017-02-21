<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
	protected $fillable = ['name', 'description', 'category_id', 'url', 'video_code', 'difficulty_id'];

	public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function stages(){
    	return $this->hasMany('App\Stage');
    }
}
