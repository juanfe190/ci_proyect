<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PassReset extends Model
{
	protected $table = 'password_resets';
	protected $fillable = ['email', 'password'];
	public $timestamps = false;
	
	 public function user(){
    	return $this->hasOne('App\User', 'email', 'email');
    }
}
