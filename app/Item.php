<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
	protected $fillable = ['name', 'description', 'position', 'item_code', 'item_type_id', 'stage_id', 'url'];

	public function stage(){
		return $this->belongsTo('App\Stage');
	}

	public function item_type(){
		return $this->belongsTo('App\ItemType');
	}
}
